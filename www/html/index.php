<?php // úvodní stránka:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
?>

<style>
  h1 {
    font-size: 3em;
    text-align: center;
    margin-bottom: 20px;
  }
  h2 {
    font-size: 2em;
    text-align: center;
    margin-bottom: 10px;
  }
  .text-box {
    padding: 20px;
    margin: 10px;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
  }
  .content-box {
    border: 2px solid #000;
    padding: 20px;
    margin: 10px;
    width: calc(33.333% - 20px);
    text-align: center;
    transition: transform 0.3s, font-size 0.3s, box-shadow 0.3s;
  }
  .content-box:hover {
    transform: scale(1.05);
    font-size: 1.1em;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  .grid-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
  }
</style>

<main class='pb-10 m-6'>
  <h1 class="pb-6 text-5xl text-center">
    <?= TITLE ?>
  </h1>

  <div class="text-box">
    <h2>Welcome to Top-Shelf: Your Ultimate Guide to Fine Spirits</h2>
  </div>

  <div class="text-box">
    <p>At Top-Shelf, we bring together connoisseurs, casual drinkers, and everyone in between to explore the fascinating world of premium alcohol. Whether you’re seeking to expand your palate, discover the rich history behind your favorite spirits, or find the perfect bottle for any occasion, you’ve come to the right place.</p>
  </div>

  <h2>What We Offer:</h2>
  <div class="grid-container">
    <div class="content-box">
      <p><strong>Extensive Catalog of Spirits:</strong><br>
      Dive into our comprehensive database featuring a wide variety of alcohol types, including whiskies, vodkas, rums, gins, tequilas, wines, and more. Each entry provides detailed information, tasting notes, and user reviews to help you make informed decisions.</p>
    </div>

    <div class="content-box">
      <p><strong>In-Depth Histories:</strong><br>
      Uncover the stories behind the spirits. Learn about the origins, production methods, and cultural significance of different types of alcohol from around the globe. Our expertly researched articles offer a rich historical context that enhances your drinking experience.</p>
    </div>

    <div class="content-box">
      <p><strong>Personalized Recommendations:</strong><br>
      Not sure what to try next? Our tailored recommendation system takes your preferences into account to suggest new and exciting bottles that match your taste profile. From rare finds to popular favorites, discover something new every time you visit.</p>
    </div>

    <div class="content-box">
      <p><strong>Community Reviews and Ratings:</strong><br>
      Join a vibrant community of enthusiasts. Share your own reviews and ratings, exchange tips, and engage in discussions with fellow spirit lovers. Your insights and experiences help others make their best choices.</p>
    </div>

    <div class="content-box">
      <p><strong>Exclusive Content and Features:</strong><br>
      Enjoy access to exclusive interviews with industry experts, distillery tours, cocktail recipes, and more. Our regularly updated content keeps you in the loop with the latest trends and innovations in the world of alcohol.</p>
    </div>
  </div>

  <div class="text-box">
    <h2>Why Top-Shelf?</h2>
    <p>Top-Shelf is more than just a database; it's a curated experience designed for those who appreciate the finer things in life. Our mission is to educate, inspire, and connect through the shared love of quality spirits. Whether you’re a seasoned aficionado or a curious newcomer, Top-Shelf is your trusted companion on this flavorful journey.</p>
  </div>

  <div class="text-box">
    <p>Ready to elevate your drinking experience? Browse our extensive selection, read up on the fascinating histories, and join our community of like-minded enthusiasts. With Top-Shelf, every bottle has a story, and every sip is an adventure.</p>
  </div>

  <div class="text-box">
    <h2>Welcome to the top tier of spirit exploration. Welcome to Top-Shelf.</h2>
  </div>
</main>

<?php require INC . '/html-end.php'; ?>
