



<?php
use App\Http\Controllers\Admin\AddRefferalController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CreditDebitController;
use App\Http\Controllers\Admin\DebitProfitController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ManageDepositController;
use App\Http\Controllers\Admin\ManageEscrowController;
use App\Http\Controllers\Admin\ManageLoanController;
use App\Http\Controllers\Admin\ManagePaymentController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ProfitController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;




     Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    });

// manger user details from admin
Route::get('/users', 'App\Http\Controllers\UserManagementController@viewUser');
Route::get('/profile/{id}/', 'App\Http\Controllers\UserManagementController@userProfile');
Route::get('/approve-deposit/{id}/', 'App\Http\Controllers\UserManagementController@ApproveDeposit');
Route::get('/decline-deposit/{id}/', 'App\Http\Controllers\UserManagementController@DeclineDeposit');

Route::get('/approve-withdrawal/{id}/', 'App\Http\Controllers\UserManagementController@ApproveWithdrawal');
Route::get('/decline-withdrawal/{id}/', 'App\Http\Controllers\UserManagementController@DeclineWithdrawal');
Route::get('/add-profit/{id}/', 'App\Http\Controllers\UserManagementController@getUserProfit');
Route::post('/debit-profit', 'App\Http\Controllers\UserManagementController@debitUserProfit');
Route::get('/debit-profit/{id}/', 'App\Http\Controllers\UserManagementController@getDebitProfit');
Route::post('/add-profit', 'App\Http\Controllers\UserManagementController@addUserProfit');
Route::get('/add-deposit/{id}/', 'App\Http\Controllers\UserManagementController@getUserDeposit');
Route::post('/add-deposit', 'App\Http\Controllers\UserManagementController@addUserDeposit');
Route::get('/add-referral/{id}/', 'App\Http\Controllers\UserManagementController@getUserReferral');
Route::post('/add-referral', 'App\Http\Controllers\UserManagementController@addUserReferral');
Route::get('/total-deposits', 'App\Http\Controllers\UserManagementController@usersDeposit');
Route::get('/total-withdrawals', 'App\Http\Controllers\UserManagementController@usersWithdrawals');
Route::get('/total-profits', 'App\Http\Controllers\UserManagementController@usersProfit');
Route::get('/update-wallet', 'App\Http\Controllers\UserManagementController@updateWallet')->name('wallet');
Route::post('/choose-wallet', 'App\Http\Controllers\UserManagementController@chooseWallet')->name('choose-wallet');
Route::post('/update-trc', 'App\Http\Controllers\UserManagementController@updateTrc')->name('update-trc');
Route::post('/update-btc', 'App\Http\Controllers\UserManagementController@updateBtc')->name('update-btc');
Route::post('/update-eth', 'App\Http\Controllers\UserManagementController@updateEth')->name('update-eth');
Route::post('/update-bank', 'App\Http\Controllers\UserManagementController@updateBank')->name('update-bank');
Route::get('/all-transactions', 'App\Http\Controllers\UserManagementController@allTransactions')->name('user.transactions');
Route::get('/send-mail', 'App\Http\Controllers\UserManagementController@sendTestMail');
Route::get('/send-mail/{id}/', 'App\Http\Controllers\UserManagementController@sendMail');
Route::post('/send-user-email', 'App\Http\Controllers\UserManagementController@sendUserEmail');
Route::get('/delete/{id}', 'App\Http\Controllers\UserManagementController@deleteUser');
Route::get('send-user-mail/{id}', 'App\Http\Controllers\UserManagementController@sendUserMail');
Route::get('update_wallet', 'App\Http\Controllers\UserManagementController@updateWallet')->name('update.wallet');
Route::post('admin_update_wallet', 'App\Http\Controllers\UserManagementController@saveWallet')->name('admin.save.wallet');
Route::post('/update-signal', 'App\Http\Controllers\UserManagementController@updateSignal')->name('update-signal');
Route::get('/add-traders', 'App\Http\Controllers\UserManagementController@addTrader')->name('add-traders');
Route::get('/edit-trader/{id}/', 'App\Http\Controllers\UserManagementController@editTrader');
Route::match(['get', 'post'], 'update-trader/{id}', 'App\Http\Controllers\UserManagementController@updateTrader')->name('update.trader');
Route::post('save-trader', 'App\Http\Controllers\UserManagementController@saveTrader')->name('save.trader');
Route::get('/delete-trader/{id}', 'App\Http\Controllers\UserManagementController@deleteTrader');
Route::get('/accept-kyc/{id}/', 'App\Http\Controllers\UserManagementController@acceptKyc');
Route::get('/decline-kyc/{id}/', 'App\Http\Controllers\UserManagementController@rejectKyc');
Route::get('/accept-bot/{id}/', 'App\Http\Controllers\UserManagementController@acceptBot');
Route::get('/decline-bot/{id}/', 'App\Http\Controllers\UserManagementController@rejectBot');
Route::match(['get', 'post'], 'send-mail', 'App\Http\Controllers\UserManagementController@sendMail')->name('send.mail');
Route::post('update-signal-strength/{id}/', 'App\Http\Controllers\UserManagementController@updateSignalStrength')->name('signal.strength');
Route::post('update-notification/{id}/', 'App\Http\Controllers\UserManagementController@updateNotification')->name('update.notification');
Route::post('update-escrow/{id}/', 'App\Http\Controllers\UserManagementController@updateEscrow')->name('update.escrow');
Route::post('update-withdrawal-code/{id}/', 'App\Http\Controllers\UserManagementController@updatewithdrawalcode')->name('update.withdrawal_code');
Route::post('update-withdrawal-percentage/{id}/', 'App\Http\Controllers\UserManagementController@updatewithdrawalpercentage')->name('update.withdrawal_percentage');
Route::post('update-withdrawal-amount/{id}/', 'App\Http\Controllers\UserManagementController@updatewithdrawalamount')->name('update.withdrawal_amount');
Route::get('/clear-account/{id}', 'App\Http\Controllers\UserManagementController@clearAccount')->name('clear.account');
Route::get('/manage-withdrawal','App\Http\Controllers\UserManagementController@manageWithdrawal')->name('manage-withdrawal');
Route::get('/manage-deposit','App\Http\Controllers\UserManagementController@manageDeposit')->name('manage-deposit');
Route::get('/{user}/suspension', 'App\Http\Controllers\UserManagementController@userSuspension')->name('user.suspension');





//wallet update

    Route::post('/choose-wallet', [WalletController::class, 'chooseWallet'])->name('choose.wallet');


    Route::get('/deposits', [ManageDepositController::class, 'UsersDepositHistory'])->name('deposits'); // becomes 'admin.user'

});

