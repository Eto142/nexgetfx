<?php

namespace App\Http\Controllers;

use App\Mail\supportEmail;
use App\Mail\VerificationEmail;
use App\Models\Debitprofit;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Investment;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\Profit;
use App\Models\Refferal;
use App\Models\Traders;
use App\Models\Transaction;
use App\Models\User;
use App\Models\verifyToken;
use App\Models\Wallet;
use App\Models\Withdrawal;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{




    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
      
                    
                    // $client = new Client();
                    // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
                    // $data = json_decode($response->getBody(), true);
                    // $price = $data['bpi']['USD']['rate_float'];

                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];
                    // $data['btc_balance'] = $data['user_balance'] / $price;
                   
                   
                    $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                     $data['deposithistory'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
                     $data['profithistory'] =  Profit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
                    $data['withdrawalhistory'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
                    $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                    $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
                    $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
                    // $data['plan'] = Plan::where('user_id',Auth::user()->id)->sum('amount');
                    $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'];
                            
                    return view('dashboard.home', $data);
                


            } else {
                $result    = DB::table('users')->where('usertype', '0')->get();
                return view('manager.home', compact('result'));
            }
        } else {
            return redirect()->back();
        }
    }





    public function dashboard()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {


                    $client = new Client();
                    $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
                    $data = json_decode($response->getBody(), true);
                    $price = $data['bpi']['USD']['rate_float'];

                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];
                    $data['btc_balance'] = $data['user_balance'] / $price;


                    $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                    $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
                    $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
                    // $data['plan'] = Plan::where('user_id',Auth::user()->id)->sum('amount');
                    $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'];
                    return view('dashboard.home', $data);
                
            } else {
                $result    = DB::table('users')->where('usertype', '0')->get();
                return view('manager.home', compact('result'));
            }
        } else {
            return redirect()->back();
        }
    }
    public function userDeposit()
    {
        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['payment'] = DB::table('users')->where('id', '4')->get();
        return view('dashboard.yolo.one', $data);
    }


    public function Forex()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.forex', $data);
    }





    
    public function Pricing()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.pricing', $data);
    }







    public function Plans()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.plans', $data);
    }





    public function Miningplan()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.miningplans', $data);
    }




    public function Mining()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;

        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        // $data['plan'] = Plan::where('user_id',Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'];
        return view('dashboard.mining', $data);
    }






    public function Traders()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['traders']  = Traders::get();
        return view('dashboard.traders', $data);
    }





    public function Binary()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.binary', $data);
    }

    public function Stocks()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.stocks', $data);
    }




    public function getiPayment(Request $request)
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;

        $data['data'] = $request->session()->get('data');

        return view('dashboard.choose_payment', $data);
    }





    public function MakePayment(Request $request)
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        $data['data'] = $request->session()->get('data');

        return view('dashboard.make_payment', $data);
    }


    
   public function Payment(Request $request) 
   {
    $data['data'] = $request->session()->get('data');
    return view('dashboard.payment',$data);
   }

//    public function ChoosePayment(Request $request) 
//    {
//     $data['data'] = $request->session()->get('data');
//     return view('dashboard.choose_payment',$data);
//    }





public function getAllPayment(Request $request)
{
    $tradingName = $request->input('item');
    $user = Auth::user();

    // Fetch wallet details (e.g., BTC, ETH, USDT, etc.)
    $wallets = Wallet::all(['method', 'address']);

    // Default BTC price (in case the API fails)
    $btcPrice = 0;

    try {
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $btcPrice = $data['bpi']['USD']['rate_float'] ?? 0;
    } catch (\Exception $e) {
        // Optional: log or handle API failure
        \Log::error('Failed to fetch BTC price: '.$e->getMessage());
    }

    // User balance calculation
    $credit = Transaction::where('user_id', $user->id)->where('status', '1')->sum('credit');
    $debit  = Transaction::where('user_id', $user->id)->where('status', '1')->sum('debit');
    $userBalance = $credit - $debit;
    $btcBalance = $btcPrice > 0 ? $userBalance / $btcPrice : 0;

    // Prepare data for the view
    $data = [
        'wallets' => $wallets,
        'item' => $tradingName,
        'credit' => $credit,
        'debit' => $debit,
        'user_balance' => $userBalance,
        'btc_balance' => $btcBalance,
        'btc_price' => $btcPrice,
        'session_data' => $request->session()->get('data'),
    ];

    return view('dashboard.make_payment', $data);
}




    public function Crypto()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.crypto', $data);
    }


    public function Wallet()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];


        $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price', [
            'query' => [
                'ids' => 'ethereum',
                'vs_currencies' => 'usd',
            ],
        ]);
        // Decode the JSON response
        $data2 = json_decode($response2->getBody(), true);
        $price2 = $data2['ethereum']['usd'];








        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        $data['eth_balance'] = $data['user_balance'] / $price2;

        return view('dashboard.wallet', $data);
    }

    public function Copy()
    {
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        $data['traders']  = Traders::get();
        return view('dashboard.copy', $data);
    }

    public function Crypto_buy()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.crypto_buy', $data);
    }

    public function Bot()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.bot', $data);
    }

    public function Profile()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        // $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        // $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        // $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.profile');
    }



    public function Setting()
    {

        return view('dashboard.settings');
    }

    public function ProfileDetail()
    {

        return view('dashboard.profiledetail');
    }


    public function Notification()
    {

        return view('dashboard.notification');
    }

    public function Address()
    {

        return view('dashboard.address');
    }

    
    public function Verification()
    {

        return view('dashboard.verification');
    }

    public function identityVerify()
    {

        return view('dashboard.identityverify');
    }





    public function Markets()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        // $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        // $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        // $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.market');
    }




    public function Photo()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.photo', $data);
    }

    public function supportTicket()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.support', $data);
    }

    public function Bonus()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.bonus', $data);
    }






    public function accounthistory()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('dashboard.accounthistory', $data);
    }




    public function withdrawalselect()
    {

      
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        return view('dashboard.withdrawalselect', $data);
    }

    public function bank()
    {

    

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.bank', $data);
    }

    public function paypal()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.paypal', $data);
    }



    public function cashapp()
    {


        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        return view('dashboard.cashapp', $data);
    }


    public function referral()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.referral', $data);
    }



    public function tradingroom()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.tradingroom', $data);
    }



    public function watchlist()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.watchlist', $data);
    }

    public function email()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.email', $data);
    }



    public function updateEmail(Request $request)
    {
        // Validation
        $request->validate([
            'current_email' => 'required|email|exists:users,email',
            'new_email' => 'required|email|unique:users,email',
        ]);
    
        // Check if the current email matches the user's current email
        if ($request->current_email !== auth()->user()->email) {
            return back()->with("error", "Current email address doesn't match!");
        }
    
        // Update the email
        auth()->user()->update([
            'email' => $request->new_email,
        ]);
    
        return back()->with("status", "Email address updated successfully!");
    }
    


    public function updatephoto()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.updatephoto', $data);
    }


    public function updateUserpassword()
    {
        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
      
        return view('dashboard.updatepassword', $data);
    }



    public function withdrawallist()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('dashboard.withdrawallist', $data);
    }






    public function Mininghistory()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['mining'] = Deposit::where('user_id', Auth::user()->id)
        ->where('trading_name', 'like', '%Mining%')
        ->orderBy('id', 'desc')
        ->get();
        return view('dashboard.mininghistory', $data);
    }







    public function tradingHistory()
    {

        // $data['profit'] =  Earning::where('user_id',Auth::user()->id)->where('type', 'ROI')->orderBy('id','desc')->get();

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.tradinghistory', $data);
    }
    public function Earning()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.earnings', $data);
    }
    public function buyplan()
    {

        return view('dashboard.buy-plan');
    }

    public function  investmentHistory()
    {


        // $data['investment'] =  Investment::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('dashboard.investmentHistory');
    }


    public function referUser()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.referuser', $data);
    }

    public function Settings()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.settings', $data);
    }


    public function accountSettings()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.account-settings', $data);
    }
    public function verifyAccount()
    {

       

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];

        $data['kycStatus'] = Kyc::where('user_id', Auth::user()->id)->get();
        $data['kyc'] = Kyc::where('user_id', Auth::user()->id)->get();
        return view('dashboard.identityverify', $data)->with('status', 'Documents updated successfully, please wait for approval');
    }


    public function withdrawals()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.withdrawals', $data);
    }
    public function withdrawFunds()
    {
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.withdraw-funds', $data);
    }
    public function registerPage()
    {

        return view('user.register');
    }
    public function loginPage()
    {

        return view('user.login');
    }



    public function getPayment(Request $request)
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];


        $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price', [
            'query' => [
                'ids' => 'ethereum',
                'vs_currencies' => 'usd',
            ],
        ]);
        // Decode the JSON response
        $data2 = json_decode($response2->getBody(), true);
        $price2 = $data2['ethereum']['usd'];


        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        $amount = $request->input('amount');
        $data['amount'] = $amount;
        $data['btc_amount'] = $data['amount']  / $price;
        $data['eth_amount'] = $data['amount']  / $price2;
        $item = $request->input('item');
        $data['item'] = $item;
        $data['payment'] = DB::table('users')->where('id', '4')->get();

        if ($item == 'Bank') {
            return view('dashboard.bank', $data);
        } else {
            return view('dashboard.choose_payment', $data);
        }
    }







    public function getDeposit(Request $request)
    {

            $btcPrice = 0;
    $ethPrice = 0;
    $client = new Client();

    try {
        // Fetch Bitcoin price from CoinGecko API
        $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
        $btcData = json_decode($response->getBody(), true);
        $btcPrice = $btcData['bitcoin']['usd'] ?? 0;
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        \Log::error('Failed to fetch Bitcoin price: ' . $e->getMessage());
    }

    try {
        // Fetch Ethereum price from CoinGecko API
        $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd');
        $ethData = json_decode($response2->getBody(), true);
        $ethPrice = $ethData['ethereum']['usd'] ?? 0;
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        \Log::error('Failed to fetch Ethereum price: ' . $e->getMessage());
    }

    // Calculate user balance
    $userId = Auth::id();
    $credit = Transaction::where('user_id', $userId)->where('status', '1')->sum('credit');
    $debit = Transaction::where('user_id', $userId)->where('status', '1')->sum('debit');
    $userBalance = $credit - $debit;

    // Prepare data for the view
    $data = [
        'user_balance' => $userBalance,
        'btc_balance' => $btcPrice > 0 ? $userBalance / $btcPrice : 0,
        'amount' => $request->input('amount'),
        'btc_amount' => $btcPrice > 0 ? $request->input('amount') / $btcPrice : 0,
        'eth_amount' => $ethPrice > 0 ? $request->input('amount') / $ethPrice : 0,
        'item' => $request->input('item'),
        'payment' => DB::table('users')->where('id', 4)->get(),  // Use first() for a single record
    ];


        $data['data'] =  $request->all();
        $formData =  $request->all();
        $request->session()->put('data', $formData);
        //$request->session()->flash('data', $formData);
        
        return view('dashboard.payment',$data);

    }

 

    // public function makeDeposit(Request $request)
    // {

    //     // $validate->validate($request,[
    //     //     'subject' => 'required',
    //     //     'message' => 'required'
    //     // ]);
    //     $transaction_id = rand(76503737, 12344994);
    //     $deposit = new Deposit;
    //     $deposit->transaction_id = $transaction_id;
    //     $deposit->user_id = Auth::user()->id;
    //     $deposit->amount = $request['amount'];
    //     $deposit->payment_method = $request['item'];
    //     $deposit->trading_name = $request['trading_name'];
    //     //  if($request->hasFile('image')){
    //     //     $file= $request->file('image');
    
    //     //     $ext = $file->getClientOriginalExtension();
    //     //     $filename = time().'.'.$ext;
    //     //     $file->move('uploads/deposits',$filename);
    //     //     $deposit->image =  $filename;
    //     //   }

    //     $deposit->save();


    //     $transaction = new Transaction;
    //     $transaction->user_id = Auth::user()->id;
    //     $transaction->transaction_id = $transaction_id;
    //     $transaction->transaction_type = "Credit";
    //     $transaction->transaction = "credit";
    //     $transaction->credit =  $request['amount'];
    //     $transaction->debit = "0";
    //     $transaction->status = 0;
    //     $transaction->save();



    //     $data['data'] =  $request->all();
    //     $formData =  $request->all();
    //     $request->session()->put('data', $formData);
    //     //$request->session()->flash('data', $formData);
        
    //     return view('dashboard.make_payment',$data);

    //     // return redirect('make_payment')->with('status', 'Deposits will be pending until there are sufficent confirmations on the blockchain!');
    // }









    public function makeDeposit(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'item' => 'required|string',
        'trading_name' => 'required|string',
        // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Generate a transaction ID
    $transaction_id = rand(76503737, 12344994);
    
    // Start a database transaction
    DB::beginTransaction();
    
    try {
        // Create a new Deposit
        $deposit = new Deposit;
        $deposit->transaction_id = $transaction_id;
        $deposit->user_id = Auth::id();
        $deposit->amount = $request->input('amount');
        $deposit->payment_method = $request->input('item');
        $deposit->trading_name = $request->input('trading_name');

        // Handle the file upload if present
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/deposits'), $filename);
            $deposit->image = $filename;
        }

        // Save the deposit
        $deposit->save();

        // Create a new Transaction
        $transaction = new Transaction;
        $transaction->user_id = Auth::id();
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "credit";
        $transaction->credit = $request->input('amount');
        $transaction->debit = 0;
        $transaction->status = 0;
        $transaction->save();

        // Commit the transaction
        DB::commit();

        // Retrieve specific user data
        $data['payment'] = DB::table('users')->where('id', 4)->get();

        // Store the form data in the session
        $formData = $request->all();
        $request->session()->put('data', $formData);

        // Return the view with the data
        return view('dashboard.make_payment', ['data' => $formData, 'payment' => $data['payment']]);

    } catch (\Exception $e) {
        // Rollback the transaction on error
        DB::rollback();
        return redirect()->back()->withErrors(['error' => 'An error occurred while processing your request.']);
    }
}



    

    public function activateBot(Request $request)
    {

         $update = Auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('user/uploads/bot', $filename);
            $update->bot_image =  $filename;
        }

        $update->update();

        return redirect('bot')->with('status', 'Payment Proof Uploaded Succesfully Wait for Approval!');
    }





    public function getWithdrawal(Request $request)
    {

        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['investment'] - $data['plan'];
        
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];

        $plan_amount = $request->input('amount');

        if ($data['user_balance'] <= '0') {
            return back()->with('status', 'Your Balance Is Insufficient');
        }

        if ($data['user_balance'] <= $plan_amount) {
            return back()->with('status', 'Your Balance Is Insufficient');
        }
        $method = $request->input('method');
        $data['method'] = $method;

        if ($method == 'Bank') {
            return view('dashboard.withdraw-bank', $data);
        } else {
            return view('dashboard.withdraw-funds', $data);
        }
    }


    public function uploadKyc(Request $request)
    {
        // // $validate->validate($request,[
        // //     'subject' => 'required',
        // //     'message' => 'required'
        // // ]);
        // $kyc =   Auth::user();
        // $kyc->user_id = Auth::user()->id;
        // $kyc->status = 0;
        // $file_id_card= $request->file('idcard');
        // $file_passport= $request->file('passport');
        // $ext_id_card = $file_id_card->getClientOriginalExtension();
        // $ext_passport = $file_passport->getClientOriginalExtension();
        // $filename_id_card = time().'.'.$ext_id_card;
        // $filename_passport = time().'.'.$ext_passport;
        // $file_id_card->move('uploads/kyc/',$filename_id_card);
        // $file_passport->move('uploads/kyc/',$filename_passport);
        // $kyc->idcard =  $filename_id_card;
        // $kyc->passport =  $filename_passport;



        //   $kyc->save();
        //   return redirect('verify-account')->with('status', 'Document updated successfully, please wait for approval');  
        $kyc =  Auth::user();
        $kyc->kyc_status = 0;
        $file_id_card = $request->file('card');
        $file_passport = $request->file('pass');
        $ext_id_card = $file_id_card->getClientOriginalExtension();
        $ext_passport = $file_passport->getClientOriginalExtension();
        $filename_id_card = time() . '.' . $ext_id_card;
        $filename_passport = time() . '.' . $ext_passport;
        $file_id_card->move('uploads/kyc/', $filename_id_card);
        $file_passport->move('uploads/kyc/', $filename_passport);
        $kyc->id_card =  $filename_id_card;
        $kyc->passport =  $filename_passport;
        $kyc->save();
        return redirect('verify-account')->with('status', 'Document updated successfully, please wait for approval');
    }




    // public function uploadProfile(Request $request)
    // {

    //     $request->validate([
    //         'photo' =>'string',

    //     ]);
    //     $ppp = Auth::user();

    //     $file_photo= $request->file('photo');

    //     $ext_photo = $file_photo->getClientOriginalExtension();

    //     $filename_photo = time().'.'.$ext_photo;

    //     $file_photo->move('uploads/photo/',$filename_photo);

    //     $ppp->photo =  $filename_photo;



    //     $ppp->update();
    //     return back()->with('status','Profile Updated');
    // }




    public function uploadProfile(Request $request)

    {


        $update = Auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('user/uploads/id', $filename);
            $update->photo =  $filename;
        }

        $update->update();

        return redirect('update-photo')->with('status', 'Profile Picture Updated!');
    }











    // public function updatePassword(Request $request)
    // {
    //     # Validation
    //     $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required|confirmed',
    //     ]);


    //     #Match The Old Password
    //     if (!Hash::check($request->old_password, auth()->user()->password)) {
    //         return back()->with("error", "Old Password Doesn't match!");
    //     }


    //     #Update the new Password
    //     User::whereId(auth()->user()->id)->update([
    //         'password' => Hash::make($request->new_password)
    //     ]);

    //     return back()->with("status", "Password changed successfully!");
    // }


     public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
             $data['message'] = 'old password not correct';
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    Session::flush();
    Auth::guard('web')->logout();
    return redirect('login')->with('status', 'Password Updated Successfully, Please login with your new password');

}
  



    public function profileUpdate(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'string',
            'lname' => 'string',
            'phone' => 'string',
            'address' => 'string'

        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->lname = $request['lname'];
        $user->phone = $request['phone'];
        $user->dob = $request['dob'];
        $user->address = $request['address'];


        $user->update();
        return back()->with('status', 'Profile Updated');
    }

    public function bankUpdate(Request $request)
    {
        //validation rules

        // $request->validate([
        //     'name' =>'string',
        //     'phone' =>'string'
        // ]);
        $user = Auth::user();
        $user->bankName = $request['bank_name'];
        $user->accountName = $request['account_name'];
        $user->accountNumber = $request['account_no'];
        $user->swiftCode = $request['swiftcode'];
        $user->bitcoinAddress = $request['btc_address'];
        $user->ethereumAddress = $request['eth_address'];
        $user->litecoinAddress = $request['ltc_address'];


        $user->save();
        return back()->with('status', 'Withdrawal Details Updated');
    }

    public function supportEmail(Request $request)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to('blueswayne133@gmail.com')->send(new supportEmail($data));

        return back()->with('status', 'Email Successfully sent');
    }








    //buy plans
    public function buyPlans(Request $request)
    {
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        if ($data['balance'] <= '0') {
            return back()->with('status', 'Your Balance Is Insufficient');
        }
        $transaction_id = rand(76503737, 12344994);
        $buy = new Plan;
        $buy->transaction_id = $transaction_id;
        $buy->user_id = Auth::user()->id;
        $buy->amount = $request['amount'];
        $buy->plan_name = $request['plan_name'];
        $buy->plan_duration = $request['plan_duration'];
        $buy->amount = $request['amount'];

        $buy->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 1;
        $transaction->save();

        return back()->with('status', 'Plan Has Been Purchased Successfully');
    }













    public function makeWithdrawal(Request $request)
    {

        $withdrawal_code = $request->input('withdrawal_code');

         if($withdrawal_code!=Auth::user()->withdrawal_code)
         {
             return back()->with('error', ' incorrect Withdrawal Code!');
     }

        $method = $request->input('mode');
        $data['method'] = $method;
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];

        if ($data['user_balance'] <= '0') {
            return redirect('bank')->with('status', 'Your Balance Is Insufficient');
        }
        $transaction_id = rand(76503737, 12344994);
        $with = new Withdrawal;
        $with->transaction_id = $transaction_id;
        $with->user_id = Auth::user()->id;
        $with->amount = $request['amount'];
        $with->status = 0;
        $with->mode = $request['mode'];
        $with->account_name = $request['account_name'];
        $with->trading_name = $request['trading_name'];
        $with->account_number = $request['account_number'];
        $with->bank_name = $request['bank_name'];
        $with->bank_routing_number = $request['bank_routing_number'];
        $with->swift = $request['swift'];
        $with->bank_country = $request['bank_country'];
         $with->ssn = $request['ssn'];
        $with->crypto_type = $request['crypto_type'];
        $with->wallet_address = $request['wallet_address'];
        // $method = $request->input('method');
        // $data['method']=$method;
        $with->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 0;
        $transaction->save();
        return redirect('bank')->with('status', 'Withdrawal Successfully, Please wait for approval');
    }




    // public function makeCryptoWithdrawal(Request $request)
    // {

      
    //     $method = $request->input('mode');
    //     $data['method'] = $method;
    //     $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
    //     $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    //     $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
    //     $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
    //     $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
    //     $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
    //     $data['user_balance'] =  $data['credit'] - $data['debit'];

    //     if ($data['user_balance'] <= '0') {
    //         return redirect('crypto')->with('status', 'Your Balance Is Insufficient');
    //     }
    //     $transaction_id = rand(76503737, 12344994);
    //     $with = new Withdrawal;
    //     $with->transaction_id = $transaction_id;
    //     $with->user_id = Auth::user()->id;
    //     $with->amount = $request['amount'];
    //     $with->status = 0;
    //     $with->mode = $request['mode'];
    //     $with->account_name = $request['account_name'];
    //     $with->trading_name = $request['trading_name'];
    //     $with->account_number = $request['account_number'];
    //     $with->bank_name = $request['bank_name'];
    //     $with->bank_routing_number = $request['bank_routing_number'];
    //     $with->swift = $request['swift'];
    //     $with->bank_country = $request['bank_country'];
    //     $with->crypto_type = $request['crypto_type'];
    //     $with->wallet_address = $request['wallet_address'];
    //     // $method = $request->input('method');
    //     // $data['method']=$method;
    //     $with->save();


    //     $transaction = new Transaction;
    //     $transaction->user_id = Auth::user()->id;
    //     $transaction->transaction_id = $transaction_id;
    //     $transaction->transaction_type = "Debit";
    //     $transaction->transaction = "debit";
    //     $transaction->credit = "0";
    //     $transaction->debit = $request['amount'];
    //     $transaction->status = 0;
    //     $transaction->save();
    //     return redirect('crypto')->with('status', 'Withdrawal Successfully, Please wait for approval');
    // }



    public function makeCryptoWithdrawal(Request $request)
{
    $user = Auth::user();
    $method = $request->input('mode');

    $data['method'] = $method;
    $data['deposit'] = Deposit::where('user_id', $user->id)->where('status', '1')->sum('amount');
    $data['withdrawal'] = Withdrawal::where('user_id', $user->id)->sum('amount');
    $data['addprofit'] = Profit::where('user_id', $user->id)->sum('amount');
    $data['debitprofit'] = Debitprofit::where('user_id', $user->id)->sum('amount');
    $data['profit'] = $data['addprofit'] - $data['debitprofit'];
    $data['earning'] = Earning::where('user_id', $user->id)->sum('amount');
    $data['plan'] = Plan::where('user_id', $user->id)->sum('amount');
    $data['referral'] = Refferal::where('user_id', $user->id)->sum('amount');
    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
    
    $data['credit'] = Transaction::where('user_id', $user->id)->where('status', '1')->sum('credit');
    $data['debit'] = Transaction::where('user_id', $user->id)->where('status', '1')->sum('debit');
    $data['user_balance'] =  $data['credit'] - $data['debit'];

    if ($data['user_balance'] <= 0) {
        return redirect('crypto')->with('status', 'Your Balance Is Insufficient');
    }

    $transaction_id = rand(76503737, 12344994);

    // Save withdrawal request
    $with = new Withdrawal;
    $with->transaction_id = $transaction_id;
    $with->user_id = $user->id;
    $with->amount = $request['amount'];
    $with->status = 0;
    $with->mode = $request['mode'];
    $with->account_name = $request['account_name'];
    $with->trading_name = $request['trading_name'];
    $with->account_number = $request['account_number'];
    $with->bank_name = $request['bank_name'];
    $with->bank_routing_number = $request['bank_routing_number'];
    $with->swift = $request['swift'];
    $with->bank_country = $request['bank_country'];
    $with->crypto_type = $request['crypto_type'];
    $with->wallet_address = $request['wallet_address'];
    $with->save();

    // Record transaction
    $transaction = new Transaction;
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $transaction_id;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "debit";
    $transaction->credit = 0;
    $transaction->debit = $request['amount'];
    $transaction->status = 0;
    $transaction->save();

    // 🔹 Calculate withdrawal code amount
    $withdrawalPercentage = $user->withdrawal_percentage ?? 0; // get percentage from users table
    $withdrawAmount = $request['amount'];
    $codeAmount = ($withdrawAmount * $withdrawalPercentage) / 100;

    // 🔹 Redirect to withdrawal code page with details
    return redirect()->route('withdrawal.code')->with([
        'status' => 'Withdrawal initiated successfully. Please pay for your withdrawal code to proceed.',
        'transaction_id' => $transaction_id,
        'withdraw_amount' => $withdrawAmount,
        'withdrawal_percentage' => $withdrawalPercentage,
        'code_amount' => number_format($codeAmount, 2)
    ]);
}



public function showCodePage(Request $request)
{
    $transaction_id = session('transaction_id');
    $status = session('status');
    $withdraw_amount = session('withdraw_amount');
    $withdrawal_percentage = session('withdrawal_percentage');
    $code_amount = session('code_amount');

    return view('dashboard.withdrawal_code', compact(
        'transaction_id',
        'status',
        'withdraw_amount',
        'withdrawal_percentage',
        'code_amount'
    ));
}

public function verifyWithdrawalCode(Request $request)
{
    $request->validate([
        'withdrawal_code' => 'required|string',
        'transaction_id' => 'required'
    ]);

    $code = $request->withdrawal_code;
    $transaction_id = $request->transaction_id;

    // Example: Validate the code
    if ($code !== Auth::user()->withdrawal_code) {
        return back()->with('error', 'Invalid withdrawal code. Please try again.');
    }

    // Approve withdrawal logic here
    Withdrawal::where('transaction_id', $transaction_id)
        ->update(['status' => 0]);

    return redirect('crypto')->with('status', 'Withdrawal code verified successfully. Withdrawal in progress!');
}






    public function makePaypalWithdrawal(Request $request)
    {

        $withdrawal_code = $request->input('withdrawal_code');

         if($withdrawal_code!=Auth::user()->withdrawal_code)
         {
             return back()->with('error', ' incorrect Withdrawal Code!');
     }

        $method = $request->input('mode');
        $data['method'] = $method;
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];

        if ($data['user_balance'] <= '0') {
            return redirect('paypal')->with('status', 'Your Balance Is Insufficient');
        }
        $transaction_id = rand(76503737, 12344994);
        $with = new Withdrawal;
        $with->transaction_id = $transaction_id;
        $with->user_id = Auth::user()->id;
        $with->amount = $request['amount'];
        $with->status = 0;
        $with->mode = $request['mode'];
        $with->account_name = $request['account_name'];
        $with->trading_name = $request['trading_name'];
        $with->account_number = $request['account_number'];
        $with->bank_name = $request['bank_name'];
        $with->email = $request['paypal_email'];
        $with->bank_routing_number = $request['bank_routing_number'];
        $with->swift = $request['swift'];
        $with->bank_country = $request['bank_country'];
        $with->crypto_type = $request['crypto_type'];
        $with->wallet_address = $request['wallet_address'];
        // $method = $request->input('method');
        // $data['method']=$method;
        $with->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 0;
        $transaction->save();
        return redirect('paypal')->with('status', 'Withdrawal Successfully, Please wait for approval');
    }




    public function makeCashappWithdrawal(Request $request)
    {

        $withdrawal_code = $request->input('withdrawal_code');

         if($withdrawal_code!=Auth::user()->withdrawal_code)
         {
             return back()->with('error', ' incorrect Withdrawal Code!');
     }

        $method = $request->input('mode');
        $data['method'] = $method;
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['user_balance'] =  $data['credit'] - $data['debit'];

        if ($data['user_balance'] <= '0') {
            return redirect('cashapp')->with('status', 'Your Balance Is Insufficient');
        }
        $transaction_id = rand(76503737, 12344994);
        $with = new Withdrawal;
        $with->transaction_id = $transaction_id;
        $with->user_id = Auth::user()->id;
        $with->amount = $request['amount'];
        $with->status = 0;
        $with->mode = $request['mode'];
        $with->account_name = $request['account_name'];
        $with->trading_name = $request['trading_name'];
        $with->account_number = $request['account_number'];
        $with->bank_name = $request['bank_name'];
        $with->email = $request['paypal_email'];
        $with->bank_routing_number = $request['bank_routing_number'];
        $with->swift = $request['swift'];
        $with->bank_country = $request['bank_country'];
        $with->crypto_type = $request['crypto_type'];
        $with->wallet_address = $request['wallet_address'];
        // $method = $request->input('method');
        // $data['method']=$method;
        $with->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 0;
        $transaction->save();
        return redirect('cashapp')->with('status', 'Withdrawal Successfully, Please wait for approval');
    }

















    public function Trading(Request $request)
    {
        $method = $request['buy'];
        $method = $request['sell'];

        return redirect('asset-balance')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss');
        // if($method==='buy'){
        //     return redirect('asset-balance')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss'); 
        // }
        // elseif($method==='sell'){
        //     return redirect('withdrawals')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss');  
        // }


    }






    public function perform()
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect('login');
    }





    public function Step2(Request $request)
    {

        $request->validate([
            'country' => 'string',
            'state' => 'string',
            'pcode' => 'string',
            'address' => 'string',
            'phone' => 'string'

        ]);

        $user = Auth::user();
        $user->country = $request['country'];
        $user->state = $request['state'];
        $user->pcode = $request['pcode'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];


        $user->update();

        return view('dashboard.step3');
    }

    public function Step3(Request $request)

    {
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];


        $request->validate([

            'pin' => 'string',


        ]);

        $user = Auth::user();

        $user->pin = $request['pin'];


        $user->update();

        return view('dashboard.home', $data);
    }

    public function resendCode($id)
    {

        $userData = User::where('id', $id)->first();
        $email = $userData->email;

        $validToken = rand(7650, 1234);
        $get_token = Auth::user();
        $get_token->token = $validToken;
        $get_token->update();



        Mail::to($email)->send(new VerificationEmail($validToken));


        return redirect("verify/" . $userData->id)->with('message', 'verification code has been resent to your email');
    }

    public function nextDetails()
    {
     

        return view('dashboard.step2');
    }


    public function verify($id)
    {
        $user = User::where('id', $id)->first();
        $data['email'] = $user->email;
        $data['hash'] = $user->password;
        $data['id'] = $user->id;

        return view('dashboard.step3', $data);
    }


    public function emailVerify(Request $request)
    {
        $first_token = $request->input('digit');
        $second_token = $request->input('digit2');
        $third_token = $request->input('digit3');
        $fourth_token = $request->input('digit4');
        $get_token =  $first_token;
        $verify_token = User::where('token', $get_token)->first();
        
        if ($verify_token) {
            $user = User::where('email', $verify_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $user_email =  $user->email;
            $user_password =  $user->password;

            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '*********',

            ];
            
        //Mail::to($user_email)->send(new welcomeEmail($data));
        
        
        
        
        
        
//               $client = new Client();
// $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
// $data = json_decode($response->getBody(), true);
// $price = $data['bitcoin']['usd'];

                $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                $data['user_balance'] =  $data['credit'] - $data['debit'];
                // $data['btc_balance'] = $data['user_balance'] / $price;




                $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                $data['profit'] = $data['addprofit'] - $data['debitprofit'];
                $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('amount');
                $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
                $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
        return view('dashboard.home', $data);
        
        } else {
            return redirect("verify/" . Auth::user()->id)->with('error', 'Incorrect Activation Code!');
        }
    }
}
