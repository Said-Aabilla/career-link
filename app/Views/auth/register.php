<?php
require __DIR__."/../../../vendor/autoload.php";

use App\Http\Request\RegisterRequest;
use App\Http\Controller\Auth\AuthController;

if(isset($_POST['registeruser'])){


  $request = new RegisterRequest($_POST['emailRegister'],$_POST['passwordRegister'],$_POST['roleRegister']);
  $controller = new AuthController();
  $controller->register($request);

  
}
?>



 <?php include "includes/header.php"; ?>
  <div class="min-h-screen bg-gray-200 flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">

    <div class="w-full max-w-md bg-white rounded-lg shadow-xl p-8 space-y-6">
     
    <form id="register-form" action="" method="POST" class="space-y-6">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" id="name" name="nameRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="emailRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="roleRegister" required
              class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
              <option value="2">Candidate</option>
              <option value="3">Recruiter</option>
            </select>
            </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="passwordRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input type="password" id="confirm-password" name="confirm-passwordRegister" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <button type="submit" name="registeruser" id="buttonRegister"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Sign Up
          </button>
        </div>
      </form>
    </div>
  </div>
<?php include "includes/footer.php"; ?>
