const cardBtns = document.querySelectorAll('.card-btn') ;
const closeBtn = document.querySelector('.closeBtn') ;
const details = document.querySelector('.wrapper2') ;
const t1 = document.querySelector('.m-title h1');
const t2 = document.querySelector('.m-title h2');
const desc = document.querySelector('.m-desc');
const r = document.querySelector('.desc-requirements');



const modules = {
    'm25': [
        "DESCRIPTIF DE MODULE M25" ,

        "Traitement Numérique de l'Information Multimédia",

        " Ce module introduit les notions de bases en multimédia avec un point de vue traitement du signal , en vue de la compréhension de la problématique scientifique et informatique liée aux applications de traitement de l'information multimédia.  Il présente les fondements scientifiques et technologiques indispensables pour le   traitement numérique de l'information multimédia, en particulier l'image et le son. Les outils, algébriques, géométriques, de traitement du signal, seront appliqués lors de  séances de travaux pratiques permettant ainsi d’illustrer les mécanismes principaux sur lesquels s'appuient l'analyse, le traitement d'images et de sons. " ,
        
        "Bases informatiques et mathématiques de niveau DEUST MIP/SMI (FST/FS)"

] ,
    'm26': [
        "DESCRIPTIF DE MODULE M26" ,

        "Technologie Web pour le Multimédia",

        "L’objectif du module est de faire acquérir les connaissances et les techniques nécessaires pour le développement d’applications multimédia sur le web. En fait, La conception et la création de pages web conviviales incluant des objets multimédia à l’aide des technologies Html5 et CSS3. Ensuite, L'insertion de script clients à l’aide de JavaScript et JQuery. Enfin, l’utilisation d’un langage de développement web dynamique pour manipuler des données stockées au sein d’un SGBDR." ,
        
        "<ul><li>Algorithmique et programmation 1 (tronc commun MIP)</li><li>Algorithmique et Programmation 2 (tronc commun MIP)</li><li>Systèmes d’Information et Base de données (tronc commun MIP)</li><li>Traitement Numérique de l'Information Multimédia – TNIM</li>"

] ,
    'm27': [
        "DESCRIPTIF DE MODULE M27" ,

        "Théorie de l’Information",

        "  La théorie de l'information, sans précision, est le nom usuel désignant la théorie de l'information de Shannon, qui est une théorie probabiliste permettant de quantifier le contenu moyen en information d'un ensemble de messages, dont le codage informatique satisfait une distribution statistique précise. Ce domaine trouve son origine scientifique avec Claude Shannon qui en est le père fondateur avec son article A Mathematical Theory of Communication publié en 1948.<ul><p>Parmi les branches importantes de la théorie de l'information de Shannon, on peut citer :</p><li>le codage de l'information .</li><li>la mesure quantitative de redondance d'un texte .</li><li>la compression de données .</li><li>données .</li><p>Dans un sens plus général, une théorie de l'information est une théorievisant à quantifier et qualifier la notion de contenu en informationprésent dans un ensemble de données. À ce titre, il existe une autrethéorie de l'information : la théorie algorithmique de l'information,créée par Kolmogorov, Solomonoff et Chaitin au début des années 1960.</p></ul>" ,
        "Bases informatiques et mathématiques de niveau DEUST MIP/SMI (FST/FS)"


] ,
    'm28': [
        "DESCRIPTIF DE MODULE M28" ,

        "Base de Données Multimédia",

        "L’objectif de ce module vise à ce que l’étudiant doit premièrement connaître les techniques de stockage et de recherche d’objets multimédia dans un système de gestion de base de données. Ensuite il doit être capable de créer une base de donné multimédia et d'en extraire les données. Pour les travaux pratiques, le SGBDR choisi est Oracle multimédia. " ,
        
        "<ul><li>Systèmes d’Information et Base de données (tronc commun MIP)</li><li>Traitement numérique de l'information multimédia - TNIM</li><li>Programmation multimédia mobile – PMM</li></ul>"

] ,
    'm29': [
        "DESCRIPTIF DE MODULE M29" ,

        "Conduite de projets Multimédias",

        " <ul><li>Acquérir et développer les connaissances et compétences requises pour conduire et gérun projet multimédia en respectant un cahier de charges.</li><li>- Se familiariser avec les méthodologies et les pratiques permettant de mener à bien projet multimédia de qualité dans le temps et le budget impartis.</li><li>Maîtriser les outils de gestion de projets multimédias.</li></ul>" ,
        
        "<ul><li>Algorithmique et programmation</li><li>- Technologie web pour le multimédia</li><li>Traitement numérique de l'information multimédia</li></ul>"

] ,
    'm30': [
        "DESCRIPTIF DE MODULE M30" ,

        "Architecture et programmation réseaux",

        "Le but de ce cours est d'offrir pour l’étudiant une introduction aux réseaux informatiques, principalement les réseaux TCP/IP et le modèle OSI. Et par la suite l’étudiant doit maitriser les concepts des algorithmes de routage sur I Parallèlement au cours, les TD et TP permettront de se familiariser avec les problèmes d’implémentation de protocoles ainsi que la mise en pratique des concepts étudiés." ,
        
        " <ul><li>Bases mathématiques et informatique DEUST MIP et/ou DEUG SMI</li><li>Traitement numérique de l'information multimédia - TNIM</li></ul>"

] ,
    'm31': [
        "DESCRIPTIF DE MODULE M31" ,

        "Transmission de données multimédia",

        "Les enseignements dans ce module s'appuient sur des disciplines larges et complémentaires, qui permettent à l'étudiant d'acquérir les bases théoriques et appliquées adaptées à la transmission et l'échange de données multimédias et les exigences des applications multimédias dans les réseaux de télécommunications. À la fin du cours, l'étudiant sera en mesure de :   <ul> <li>comprendre la transmission et l'échange de données multimédia</li> <li>comprendre les technologies de compression d'image, de vidéo, d'audio et de parole.</li> <li>comprendre les mécanismes assurant la qualité de service pour les applicatio multimédias.</li></ul>" ,
        
        " <ul> <li>Traitement numérique de l'information multimédia</li> <li>Architecture et programmation réseau</li></ul>"

] ,
    'm32': [
        "DESCRIPTIF DE MODULE M32" ,

        "Multimédia sur IP et Qualité de services",

        "Le but de ce cours est de présenter à l’étudiant les différents protocoles de transport et de gestion des multimédias sur IP ainsi que les concepts de la qualité de services et voir l’impact des flux multimédias sur la QoS. Et par la suite l’étudiant do maitriser les concepts utilisés pour le transfert du multimédia sur IP. Parallèlement au cours, les TD et TP permettront de se familiariser avec les problèm d’implémentation de protocoles ainsi que la mise en pratique des concepts étudiés." ,
        
        "<ul><li>Systèmes d’Information et Base de données (tronc commun MIP)</li><li>Traitement numérique de l'information multimédia - TNIM</li><li>Programmation multimédia mobile – PMM</li></ul>"

] ,
    'm33': [
        "DESCRIPTIF DE MODULE M33" ,

        "Programmation Multimédia Mobile",

        "L’objectif du module est de faire acquérir les connaissances et les techniques nécessaires pour le développement d’applications multimédia sur une plateforme mobile. Le type d’application traitée est celui manipulant des obje multimédia. La technologie mobile utilisée est celle liée à la plateforme Java Android." ,
        
        "<ul><li>Algorithmique et programmation 1 (tronc commun MIP)</li><li>Algorithmique et Programmation 2 (tronc commun MIP)</li><li>Systèmes d’Information et Base de données (tronc commun MIP)</li><li>Traitement Numérique de l'Information Multimédia - TNIM</li></ul>"

] ,
    'pfe': [
        "DESCRIPTIF DE MODULE PFE" ,

        "PROJET DE FIN D’ETUDES",

        "Le projet de fin d'études a un double but, il doit d'une part permettre à l’étudiant d'acquérir une expérience de gestion de projet par la pratique, et d'autre part lui offrir l'occasion de se constituer une carte de visite.Le travail à effectuer répond à un besoin industriel exprimé par un professionnel qui assure un cotutorat avec un enseignant universitaire ou bien correspond aux attentes d’une thématique, en développement dans le laboratoire attaché au département informatique, et qui sera encadré par un enseignant du département." ,
        
        "tous les modules"

] ,
}


cardBtns[0].addEventListener('click',function(){
    afficherDescriptif(modules['m25']);
});
cardBtns[1].addEventListener('click',function(){
    afficherDescriptif(modules['m26']);
});
cardBtns[2].addEventListener('click',function(){
    afficherDescriptif(modules['m27']);
});
cardBtns[3].addEventListener('click',function(){
    afficherDescriptif(modules['m28']);
});
cardBtns[4].addEventListener('click',function(){
    afficherDescriptif(modules['m29']);
});
cardBtns[5].addEventListener('click',function(){
    afficherDescriptif(modules['m30']);
});
cardBtns[6].addEventListener('click',function(){
    afficherDescriptif(modules['m31']);
});
cardBtns[7].addEventListener('click',function(){
    afficherDescriptif(modules['m32']);
});
cardBtns[8].addEventListener('click',function(){
    afficherDescriptif(modules['m33']);
});
cardBtns[9].addEventListener('click',function(){
    afficherDescriptif(modules['pfe']);
});

function afficherDescriptif(module){
    t1.innerHTML = '';
    t2.innerHTML = '';
    desc.innerHTML = '';
    r.innerHTML = '';
    t1.innerHTML =  module[0] ;
    t2.innerHTML = module[1] ;
    desc.innerHTML = module[2] ;
    r.innerHTML = module[3] ;
    details.style.display =  "grid" ;
    
}
$(function(){
    $('.closeBtn').on('click',function(){$('.wrapper2').fadeOut()});
})



