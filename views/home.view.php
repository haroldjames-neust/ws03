<?php
    require basePath('views/partials/head.php'); ?>
<?php
    require basePath('views/partials/navbar.php'); ?>
<?php
    require basePath('views/partials/showcase-search.php'); ?>
<?php
    require basePath('views/partials/top-banner.php'); ?>

    <section>
      <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Recent Jobs</div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

          <?php foreach($listings as $listing): ?>
            <div class="rounded-lg shadow-md bg-white">
            <div class="p-4">   
              <h2 class="text-xl font-semibold"><?= $listing->title ?></h2>
              <p class="text-gray-700 text-lg mt-2">
                <?= $listing->description ?>
              </p>
              <ul class="my-4 bg-gray-100 p-4 rounded">
                <li class="mb-2"><strong>Salary:</strong> $<?= $listing->salary ?></li>
                <li class="mb-2">
                  <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?></li>
                <li class="mb-2"></li>
                  <strong>Company:</strong> <?= $listing->company ?>
          </li>
                  
                  <span
                    class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2"
                    ><?= $listing->is_remote  ?></span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> 
                  <?php 
                    $tags = explode(',', $listing->tags);
                    foreach($tags as $tag){
                      echo "<span>{$tag}</span>, ";
                    }
                  ?>
                </li>
              </ul>
              <a href="/listings/<?= $listing->id ?>"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>   
            </div>
          </div>
        <?php endforeach; ?>

          <!-- Job Listing 1: Software Engineer -->
          <div class="rounded-lg shadow-md bg-white">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Software Engineer</h2>
              <p class="text-gray-700 text-lg mt-2">
                We are seeking a skilled software engineer to develop
                high-quality software solutions.
              </p>
              <ul class="my-4 bg-gray-100 p-4 rounded">
                <li class="mb-2"><strong>Salary:</strong> $80,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> New York
                  <span
                    class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2"
                    >Local</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Development</span>,
                  <span>Coding</span>
                </li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>
     
        
        </div>
        <a href="listings.html" class="block text-xl text-center">
          <i class="fa fa-arrow-alt-circle-right"></i>
          Show All Jobs
        </a>
      </section>

       <!-- Bottom Banner -->
     
     
  </body>
</html>
<?php
    require basePath('views/partials/bottom-banner.php'); ?>
<?php
    require basePath('views/partials/footer.php'); ?>