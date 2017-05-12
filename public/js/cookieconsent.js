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
            "message": "En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de traceurs " +
            "(cookies) pour vous proposer des contenus et services adaptés à vos centres d'intérêts.",
            "dismiss": "Ok, tout accepter",
            "link": "En savoir plus",
            "href": "/?page=legal"
        }
    })});