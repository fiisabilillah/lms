<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Course;
use App\Models\Course_goal;
use App\Models\CourseSection;
use App\Models\CourseLecture;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\Orderconfirm;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        $course = Course::find($id);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        // Check if the course is already in the cart
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Course is already in your cart']);
        }

        if ($course->discount_price == NULL) {

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);
        } else {

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);
        }

        return response()->json(['success' => 'Successfully Added on Your Cart']);
    } // End Method 


    public function CartData()
    {

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    } // End Method 


    public function AddMiniCart()
    {

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    } // End Method 


    public function RemoveMiniCart($rowId)
    {

        Cart::remove($rowId);
        return response()->json(['success' => 'Course Remove From Cart']);
    } // End Method 


    public function MyCart()
    {

        return view('frontend.mycart.view_mycart');
    } // End Method 


    public function GetCartCourse()
    {

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    } // End Method 

    public function CartRemove($rowId)
    {

        Cart::remove($rowId);

        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
            ]);
        }
        return response()->json(['success' => 'Course Remove From Cart']);
    } // End Method 


    // CODE LAMA CUPON
    // public function CouponApply(Request $request){

    //     $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first(); 

    //     if ($coupon) {
    //         Session::put('coupon',[
    //             'coupon_name' => $coupon->coupon_name,
    //             'coupon_discount' => $coupon->coupon_discount,
    //             'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
    //             'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100 )
    //         ]);

    //         return response()->json(array(
    //             'validity' => true,
    //             'success' => 'Coupon Applied Successfully'
    //         ));

    //     }else {
    //         return response()->json(['error' => 'Invaild Coupon']);
    //     }

    // }// End Method 


    // public function CouponCalculation(){

    //     if (Session::has('coupon')) {
    //        return response()->json(array(
    //         'subtotal' => Cart::total(),
    //         'coupon_name' => session()->get('coupon')['coupon_name'],
    //         'coupon_discount' => session()->get('coupon')['coupon_discount'],
    //         'discount_amount' => session()->get('coupon')['discount_amount'],
    //         'total_amount' => session()->get('coupon')['total_amount'],
    //        ));
    //     } else{
    //         return response()->json(array(
    //             'total' => Cart::total(),
    //         ));
    //     }

    // }// End Method 
    // CODE LAMA CUPON


    public function CouponApply(Request $request)
    {
        // Temukan kupon yang valid
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
            ->first();

        if ($coupon) {
            $total = floatval(str_replace(',', '', Cart::total())); // Pastikan total adalah float

            $discountAmount = round($total * $coupon->coupon_discount / 100);
            $totalAmount = round($total - $discountAmount);

            // Logging untuk debugging
            // Log::info("Total before discount: $total");
            // Log::info("Discount amount: $discountAmount");
            // Log::info("Total after discount: $totalAmount");

            // Simpan informasi kupon di sesi
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount
            ]);

            return response()->json([
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ]);
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public function InsCouponApply(Request $request)
    {
        // Temukan kupon yang valid
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
            ->first();
    
        if ($coupon) {
            if ($coupon->course_id == $request->course_id && $coupon->instructor_id == $request->instructor_id) {
                $total = floatval(str_replace(',', '', Cart::total())); // Pastikan total adalah float
    
                $discountAmount = round($total * $coupon->coupon_discount / 100);
                $totalAmount = round($total - $discountAmount);
    
                // Simpan informasi kupon di sesi
                Session::put('coupon', [
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => $discountAmount,
                    'total_amount' => $totalAmount
                ]);
    
                return response()->json([
                    'validity' => true,
                    'success' => 'Coupon Applied Successfully'
                ]);
            } else {
                return response()->json(['error' => 'Coupon Criteria Not Met for this course and instructor']);
            }
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }
    

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ]);
        } else {
            return response()->json([
                'total' => Cart::total(),
            ]);
        }
    }



    public function CouponRemove()
    {

        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    } // End Method 



    public function CheckoutCreate()
    {

        if (Auth::check()) {

            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartTotal = Cart::total();
                $cartQty = Cart::count();

                return view('frontend.checkout.checkout_view', compact('carts', 'cartTotal', 'cartQty'));
            } else {

                $notification = array(
                    'message' => 'Add At list One Course',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    } // End Method 


    // CODE LAMA
    // public function Payment(Request $request){

    //     if (Session::has('coupon')) {
    //        $total_amount = Session::get('coupon')['total_amount'];
    //     }else {
    //         $total_amount = round(Cart::total());
    //     }

    //     // Cerate a new Payment Record 

    //     $data = new Payment();
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     $data->phone = $request->phone;
    //     $data->address = $request->address;
    //     $data->cash_delivery = $request->cash_delivery;
    //     $data->total_amount = $total_amount;
    //     $data->payment_type = 'Direct Payment';

    //     $data->invoice_no = 'EOS' . mt_rand(10000000, 99999999);
    //     $data->order_date = Carbon::now()->format('d F Y');
    //     $data->order_month = Carbon::now()->format('F');
    //     $data->order_year = Carbon::now()->format('Y');
    //     $data->status = 'pending';
    //     $data->created_at = Carbon::now(); 
    //     $data->save();


    //    foreach ($request->course_title as $key => $course_title) {

    //         $existingOrder = Order::where('user_id',Auth::user()->id)->where('course_id',$request->course_id[$key])->first();

    //         if ($existingOrder) {

    //             $notification = array(
    //                 'message' => 'You Have already enrolled in this course',
    //                 'alert-type' => 'error'
    //             );
    //             return redirect()->back()->with($notification); 
    //         } // end if 

    //         $order = new Order();
    //         $order->payment_id = $data->id;
    //         $order->user_id = Auth::user()->id;
    //         $order->course_id = $request->course_id[$key];
    //         $order->instructor_id = $request->instructor_id[$key];
    //         $order->course_title = $course_title;
    //         $order->price = $request->price[$key];
    //         $order->save();

    //        } // end foreach 

    //        $request->session()->forget('cart');

    //        $paymentId = $data->id;

    //        /// Start Send email to student ///
    //        $sendmail = Payment::find($paymentId);
    //        $data = [
    //             'invoice_no' => $sendmail->invoice_no,
    //             'amount' => $total_amount,
    //             'name' => $sendmail->name,
    //             'email' => $sendmail->email,
    //        ];

    //        Mail::to($request->email)->send(new Orderconfirm($data));


    //        /// End Send email to student /// 


    //         if ($request->cash_delivery == 'stripe') {
    //            echo "stripe";
    //         }else{

    //             $notification = array(
    //                 'message' => 'Cash Payment Submit Successfully',
    //                 'alert-type' => 'success'
    //             );
    //             return redirect()->route('index')->with($notification); 

    //         }  

    // }// End Method 
    // CODE LAMA

    public function Payment(Request $request)
    {

        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'cash_delivery' => 'required|string',
            'course_title' => 'required|array',
            'course_id' => 'required|array',
            'instructor_id' => 'required|array',
            'price' => 'required|array',
        ]);

        // Mendapatkan total pembayaran
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = floatval(str_replace(',', '', Cart::total()));
            $total_amount = round($total_amount);
        }

        // Membuat record pembayaran baru
        $data = new Payment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->cash_delivery = $request->cash_delivery;
        $data->total_amount = $total_amount;
        $data->payment_type = 'Direct Payment';

        $data->invoice_no = 'EOS' . mt_rand(10000000, 99999999);
        $data->order_date = Carbon::now()->format('d F Y');
        $data->order_month = Carbon::now()->format('F');
        $data->order_year = Carbon::now()->format('Y');
        $data->status = 'pending';
        $data->created_at = Carbon::now();
        $data->save();

        // Memproses pesanan untuk setiap kursus yang dibeli
        foreach ($request->course_title as $key => $course_title) {

            $existingOrder = Order::where('user_id', Auth::user()->id)
                ->where('course_id', $request->course_id[$key])
                ->first();

            if ($existingOrder) {
                $notification = array(
                    'message' => 'You have already enrolled in this course.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

            $order = new Order();
            $order->payment_id = $data->id;
            $order->user_id = Auth::user()->id;
            $order->course_id = $request->course_id[$key];
            $order->instructor_id = $request->instructor_id[$key];
            $order->course_title = $course_title;
            $order->price = $request->price[$key];
            $order->save();
        }

        // Hapus session keranjang belanja setelah pembelian berhasil
        $request->session()->forget('cart');

        // Kirim email konfirmasi pembayaran
        $this->sendPaymentConfirmationEmail($data);

        // Redirect sesuai jenis pembayaran yang dipilih
        if ($request->cash_delivery == 'stripe') {
            return "stripe"; // Ganti dengan tindakan yang sesuai untuk pembayaran melalui Stripe
        } else {
            $notification = array(
                'message' => 'Cash Payment Submitted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('index')->with($notification);
        }
    }

    // Metode untuk mengirim email konfirmasi pembayaran
    private function sendPaymentConfirmationEmail($payment)
    {
        $data = [
            'invoice_no' => $payment->invoice_no,
            'amount' => $payment->total_amount,
            'name' => $payment->name,
            'email' => $payment->email,
        ];

        Mail::to($payment->email)->send(new Orderconfirm($data));
    }


    public function BuyToCart(Request $request, $id)
    {

        $course = Course::find($id);

        // Check if the course is already in the cart
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Course is already in your cart']);
        }

        if ($course->discount_price == NULL) {

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);
        } else {

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);
        }

        return response()->json(['success' => 'Successfully Added on Your Cart']);
    } // End Method 





}
