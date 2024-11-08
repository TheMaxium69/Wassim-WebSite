<?php $page_id = 1; require "@tyrositeframework/start.php"; ?>


<div class="hideMe">
  <header> <?php $cp_navbar(); ?> </header>
  
  <main>
    <div id="masterWrap">
      <div id="panelWrap">
        <?= $cp_bio(); ?>
    
        <?= $cp_cardstat(); ?>
    
        <?= $cp_videocards(); ?>
    
        <?= $cp_feedback(); ?>
    
        <?= $cp_formContact(); ?>
      </div>
    </div>
    <div class="dots"></div>
    <div class="toolTips">
      <div class="toolTip">Accueil</div>
      <div class="toolTip">Stats</div>
      <div class="toolTip">Portfolio</div>
      <div class="toolTip">Feedback</div>
      <div class="toolTip">Contact</div>
    </div>

  </main>

  <?php $cp_footer() ?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/Draggable.min.js"></script>

<?php $js_scroll(); ?>


<style>
    body {
    padding: 0;
    margin: 0;
    overflow: hidden;
  }
  
  #masterWrap {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
  }
  
  #panelWrap {
    width: 100%;
    height: 100%;
  }
  
  section {
    width: 100%;
    display: flex;
    align-content: center;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
  }
  
  .dot {
    width: 12px;
    height: 12px;
    border-radius: 100%;
    position: relative;
    background-color: gold;
    margin: 12px;
    cursor: pointer;
  }
  
  .dots {
    position: absolute;
    z-index: 100;
    top: 50%;
    right: 16px;
  }
  
  nav {
    position: absolute;
    z-index: 100;
  }
  
  footer {
    opacity: 0;
    visibility: hidden;
    transform: translateY(100%);
    transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.5s ease-in-out;
    position: fixed;
    z-index: 100;
    bottom: 0;
    left: 0;
    width: 100%; 
  }

  footer.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  
  .toolTips {
    position: absolute;
    top: 50%;
    right: 50px;
    z-index: 1000;
  }
  @media (hover:none) {
    .toolTips  {
        visibility: hidden;
    }
  }

  .toolTip {
    color: black;
    opacity: 0;
    text-align: right;
    height: 12px;
    margin: 12px 0;
    line-height: 12px;
    left: 10px;
    top: 10px;
  }
  
  .hideMe {
    opacity: 0;
  }

</style>





<?php require "@tyrositeframework/end.php"; ?>