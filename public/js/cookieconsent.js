// When page loads, a cookies consent message appers (from cookieconsent.insites.com)
window.addEventListener("load", function(){
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#bfc0c0",
                "text": "#574e4e"
            },
            "button": {
                "background": "#ff4756"
            }
        },
        "theme": "classic",
        "content": {
            "message": "En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de [Cookies ou autres traceurs ]pour vous proposer [Par exemple, des publicités ciblées adaptés à vos centres d’intérêts] et [Par exemple, réaliser des statistiques de visites].",
            "dismiss": "Ok, tout accepter",
            "link": "En savoir plus",
            "href": "/?page=legal"
        }
    })});