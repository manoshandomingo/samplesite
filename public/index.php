<!DOCTYPE html>
<html>
<head>
<style>
  @import url('https://fonts.googleapis.com/css?')
  .:root{--background: rgba(85,214,170,.85);
  }
  .*, *::before, *::after{
    box-sizing:border-box;
  }
  
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.85);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

.item1 {
  grid-area: 2 / 2 / span 3 / span 2;
}
</style>
  <h1 class = "logo">LOGO</h1>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Galary</a></li>
      <li><a href="#">Projects</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>
</head>
<body>

<h1>The grid-area Property</h1>

<p>You can use the <em>grid-area</em> property to specify where to place an item.</p>
<p>The syntax is grid-row-start / grid-column-start / grid-row-end / grid-column-end.</p>
<p>Item1 will start on row 2 and column 1, and span 2 rows and 3 columns:</p>

<div class="grid-container">
  <div class="item1">1</div>
  <div class="item2">2</div>
  <div class="item3">3</div>  
  <div class="item4">4</div>
  <div class="item5">5</div>
  <div class="item6">6</div>
  <div class="item7">7</div>
  <div class="item8">8</div>
</div>

</body>
</html>

