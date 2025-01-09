<?php
require __DIR__."/../../../vendor/autoload.php";
use App\Repository\UserRepository;

if(isset($_POST['submitSignIn'])){

  $repository = new UserRepository();
  $user = $repository->findByEmail($_POST['email']);

  var_dump($user);
  exit();

}
?>



 <?php include "includes/header.php"; ?>
  <div class="min-h-screen bg-gray-200 flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">

    <div class="w-full max-w-md bg-white rounded-lg shadow-xl p-8 space-y-6">
      <h2 class="tite text-3xl font-semibold text-center text-gray-800">Welcome Back!</h2>
      <p class="signuptext text-center text-gray-600">Please sign in to continue.</p>

      <form id="login-form" action="" method="POST" class="space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="email" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 text-gray-900 focus:outline-none">
        </div>

        <div class="flex justify-end">
          <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Forgot Password?</a>
        </div>

        <div>
          <button type="submit" name="submitSignIn"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Sign In
          </button>
        </div>
      </form>

      

      <div class="text-center">
        <p class="text-sm text-gray-600">
          <a href="register.php"  class="text-blue-600 hover:text-blue-500 font-semibold">Don't have an account? Sign Up</a>
        </p>
      </div>
    </div>
  </div>
<?php include "includes/footer.php"; ?>
