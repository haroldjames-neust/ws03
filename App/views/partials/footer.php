<?php
  use Framework\Session;
?>



<!-- Footer -->
<footer class="bg-indigo-900 text-white mt-10">
  <div class="container mx-auto px-6 py-10">

    <!-- Top Row: Brand + Nav Links -->
    <div class="flex flex-col md:flex-row items-start justify-between gap-8">

      <!-- Brand -->
      <div class="flex-1">
        <h3 class="text-2xl font-bold text-yellow-500 mb-2">
          <i class="fa fa-briefcase mr-1"></i> JobBees
        </h3>
        <p class="text-gray-300 text-sm max-w-xs">
          Connecting talented people with the right opportunities. Your next great hire — or career — starts here.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="flex-1">
        <h4 class="text-sm font-semibold uppercase tracking-widest text-yellow-400 mb-3">Quick Links</h4>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="/" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-home mr-1"></i> Home</a></li>
          <li><a href="/listings" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-list mr-1"></i> Browse Jobs</a></li>
          <?php if (!Session::has('user')): ?>
          <li><a href="/listings/create" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-edit mr-1"></i> Post a Job</a></li>
          <li><a href="/auth/login" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-sign-in mr-1"></i> Login</a></li>
          <li><a href="/auth/register" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-user-plus mr-1"></i> Register</a></li>
          <?php else: ?>
          <li><a href="/listings/create" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-edit mr-1"></i> Post a Job</a></li>
          <li><a href="/auth/logout" class="hover:text-yellow-400 transition duration-200"><i class="fa fa-sign-out mr-1"></i> Logout</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Contact / Social -->
      <div class="flex-1">
        <h4 class="text-sm font-semibold uppercase tracking-widest text-yellow-400 mb-3">Get in Touch</h4>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><i class="fa fa-envelope mr-2 text-yellow-500"></i> support@jobbees.com</li>
          <li><i class="fa fa-phone mr-2 text-yellow-500"></i> +63 912 345 6789</li>
          <li><i class="fa fa-map-marker mr-2 text-yellow-500"></i> Manila, Philippines</li>
        </ul>
        <!-- Social Icons -->
        <div class="flex gap-3 mt-4">
          <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-200 text-lg" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-200 text-lg" title="Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-200 text-lg" title="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- Divider -->
    <hr class="border-blue-700 my-8" />

    <!-- Bottom Row: Copyright -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-3 text-sm text-gray-400">
      <p>&copy; 2026 <span class="text-yellow-400 font-semibold">JobBees</span>. All Rights Reserved.</p>
      <div class="flex gap-4">
        <a href="#" class="hover:text-yellow-400 transition duration-200">Privacy Policy</a>
        <span class="text-blue-700">|</span>
        <a href="#" class="hover:text-yellow-400 transition duration-200">Terms of Use</a>
      </div>
    </div>

  </div>
</footer>