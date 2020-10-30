// Previent les ecrans trop petit
var Lscreen=screen.width;
var Hscreen=screen.height;

if((Lscreen < 240 && Hscreen < 310) || Lscreen < 310){
  alert('Votre expérience sur le site risque de ne pas être optimale. Nous vous conseillons de revenir avec un écran plus grand ');
}

// Initialisation animation scroll (Plugin ScrollReveal)
const sr = ScrollReveal({
    origin: 'top',
    delay: 500,
    duration: 300,
    mobile: false
});

sr.reveal('#animation');

sr.reveal('#presentation');

sr.reveal('#competences');

sr.reveal('#lm');

sr.reveal('#cv');

sr.reveal("#boutique");

sr.reveal ("#footer");