
// const lorem = 'ipsum';

// alert(lorem);

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

var Swiper = new Swiper('.swiper-container', {
direction: 'horizontal',
loop: true,
grabCursor: true,

// pagination: {
//     el: '.swiper-pagination',
// },
navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
}
});