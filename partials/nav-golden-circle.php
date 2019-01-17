<?php
/**
 * Golden Circle nav component
 *
 * @package LLAL
 */
?>

<section class="nav golden-circle branco-bg padding-top-large padding-bottom-large">
  <div class="custom-container">
    <div class="row padding-bottom-medium">
      <div class="col-12">
        <h2 class="text-center h1">Nosso Círculo de Ouro</h2>
      </div>
    </div>
    <div class="row padding-top-medium">
      <div class="col-12 col-lg-5">
          <div class="nav w-100" id="theCircle">
              <div id="oqueIlustra" href="#oque" data-toggle="tab" role="tab" aria-controls="oque" aria-selected="true" class="w-100 nav-link active padding-top-medium amarelo-bg"></div>
              <div id="comoIlustra" href="#como" data-toggle="tab" role="tab" aria-controls="como" aria-selected="false" class="w-100 nav-link padding-top-medium marrom-bg"></div>
              <div id="porqueIlustra" href="#porque" data-toggle="tab" role="tab" aria-controls="porque" aria-selected="false" class="w-100 nav-link padding-top-medium amarelo-bg">
                  <svg width="111" height="131" viewBox="0 0 111 131" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M89.2505 100.065V69.7527C89.2503 66.9867 88.5225 64.2695 87.1401 61.8742C85.7578 59.4789 83.7697 57.4898 81.3756 56.1068L73.5007 51.5557L47.2496 66.71L60.377 74.289C61.1748 74.7507 61.8371 75.4143 62.2974 76.2131C62.7577 77.012 62.9999 77.918 62.9995 78.8401V90.9702C62.9996 91.8917 62.7573 92.7971 62.297 93.5953C61.8366 94.3935 61.1745 95.0565 60.377 95.5176L49.8759 101.584C49.0773 102.045 48.1716 102.288 47.2496 102.288C46.3277 102.288 45.422 102.045 44.6234 101.584L34.126 95.5176C33.3276 95.0572 32.6645 94.3946 32.2034 93.5962C31.7424 92.7979 31.4997 91.8922 31.4998 90.9702V75.8196L5.25244 90.9813V100.065C5.25191 102.831 5.97904 105.548 7.36074 107.943C8.74243 110.338 10.73 112.328 13.1237 113.711L39.3673 128.891C41.7619 130.273 44.4778 131.001 47.2422 131.001C50.0067 131.001 52.7225 130.273 55.1172 128.891L81.3682 113.726C83.7658 112.342 85.7568 110.351 87.1406 107.953C88.5244 105.555 89.2522 102.834 89.2505 100.065Z" fill="white"/>
                      <path d="M0 39.4257L26.251 24.2603L47.2496 36.3941L21.0023 51.5558L0 39.4257Z" fill="white"/>
                      <path d="M5.25244 90.9814L102.374 34.8745C104.769 33.4921 106.757 31.5031 108.14 29.1077C109.522 26.7122 110.25 23.9947 110.249 21.2286V0L13.1237 56.1069C10.73 57.49 8.74243 59.4793 7.36073 61.8746C5.97904 64.27 5.25191 66.9871 5.25244 69.7528V90.9814Z" fill="#683431"/>
                  </svg>
              </div>
          </div>
      </div>
      <div class="col-12 offset-lg-1 col-lg-6">
        <ul class="nav nav-tabs" id="goldenCircleTabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="oque-tab" data-toggle="tab" href="#oque" role="tab" aria-controls="oque" aria-selected="true">O quê</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="como-tab" data-toggle="tab" href="#como" role="tab" aria-controls="como" aria-selected="false">Como</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="porque-tab" data-toggle="tab" href="#porque" role="tab" aria-controls="porque" aria-selected="false">Por quê</a>
          </li>
        </ul>
        <div class="tab-content" id="goldenCircleContent">
          <div class="tab-pane fade show active" id="oque" role="tabpanel" aria-labelledby="oque-tab">
            <p>O quê Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor lorem ipsum dolor.</p>
            <p>Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Nossas especialidades consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
          <div class="tab-pane fade" id="como" role="tabpanel" aria-labelledby="como-tab">
            <p>Como Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor lorem ipsum dolor.</p>
            <p>Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Nossas especialidades consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
          <div class="tab-pane fade" id="porque" role="tabpanel" aria-labelledby="porque-tab">
            <p>Por quê Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor lorem ipsum dolor.</p>
            <p>Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Nossas especialidades consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      $('#theCircle .nav-link, #goldenCircleTabs .nav-link').click(function (e) {
        var href = $(this).attr('href');
        $('#theCircle .nav-link, #goldenCircleTabs .nav-link').removeClass('active');
        $('#theCircle .nav-link[href="'+href+'"], #goldenCircleTabs .nav-link[href="'+href+'"]').addClass('active');
        $('.tab-pane').removeClass('active show');
        $('.tab-pane'+href).addClass('active show');
      })
      </script>
    </div>
  </div>
</section>
