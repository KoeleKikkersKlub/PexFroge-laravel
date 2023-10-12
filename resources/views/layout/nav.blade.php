@extends('layout.app')
@vite('resources/js/nav.js')



<div class="triangle-element"> </div>

<div class="topnav">
<a href="#news">News</a>
</div>

<div class="hamburger-menu">
  <input id="menu__toggle" type="checkbox" />
  <label class="menu__btn" for="menu__toggle">
    <span></span>
  </label>

  <ul class="menu__box">
  
    <li><a class="menu__item" href="#">Home</a></li>
          <li><a class="menu__item" href="#">Chat</a></li>
          <li><a class="menu__item" href="#">Bedrijven lijst</a></li>
  </ul>
</div>
