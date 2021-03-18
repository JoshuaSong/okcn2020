<template>
<div class="page" data-name="catalog">
 <!-- Top Navbar -->
 <div class="navbar">
    <div class="navbar-inner sliding">
      <div class="left">
        <a href="#" class="link back">
          <i class="icon icon-back"></i>
          <span class="ios-only">Back</span>
        </a>
      </div>
      <div class="title">About</div>
    </div>
  </div>
<div class="page-content">
<div class="toolbar tabbar toolbar-top" style="top:0">
    <div class="toolbar-inner">
      <a href="#tab-10" class="tab-link tab-link-active">Tab 1</a>
      <a href="#tab-20" class="tab-link">Tab 2</a>
      <a href="#tab-30" class="tab-link">Tab 3</a>
    </div>
  </div>
  <div class="tabs">
    <div id="tab-10" class="page-content tab tab-active">
      <div class="block">
        <p>Tab 1 content</p>
        ...
      </div>
    </div>
    <div id="tab-20" class="page-content tab">
      <div class="block">
        <p>Tab 2 content</p>
        ...
      </div>
    </div>
    <div id="tab-30" class="page-content tab">
      <div class="block">
        <p>Tab 3 content</p>
        ...
      </div>
    </div>
  </div>
</div>
</div>


</template>
<script>
  return {
    data: function () {
      return {
        products: this.$root.products,
      };
    }
  };
</script>
