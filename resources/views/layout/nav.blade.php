@extends('layout.app')
@vite('resources/js/nav.js')


<div class="triangle-element"> </div>

  <div class="topnav">

  <div style="background-image: url('ImageLocation');background-size: cover; height:480px; padding-top:80px;">
  <img src="alfa-college" style="height:150px">

</div>

  </div>

  <div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
    
      <li><a class="menu__item" href="">Home</a></li>
			<li><a class="menu__item" href="">Chat</a></li>
			<li><a class="menu__item" href="">Bedrijven lijst</a></li>
    </ul>
  </div>
