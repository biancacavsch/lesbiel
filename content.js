/*
 * ============================================================================
 *  CONTEÚDO DO SITE LESBIEL
 * ----------------------------------------------------------------------------
 *  Este é o ÚNICO arquivo que você precisa editar para adicionar conteúdo.
 *  Não mexa no HTML das seções — ele é montado automaticamente a partir daqui.
 *
 *  Como adicionar:
 *    • VOZ (cards de episódios):     copie um bloco de "voz" e troque os dados.
 *    • CARROSSEL (citações):         copie um bloco de "quotes".
 *    • LESBIEL INDICA (obras):       copie um bloco de "indica".
 *    • TEXTO (lista de textos):      copie um bloco de "textos".
 *    • LINKS (linktree):             copie um bloco de "links".
 *
 *  Campos úteis:
 *    link:  "#"  -> botão "Em breve" (modal). Use a URL real para linkar.
 *    soon:  true -> força o aviso "Em breve" mesmo com link "#".
 * ============================================================================
 */

window.LESBIEL = {

  /* ---- Seção VOZ: cards de episódios do Spotify ------------------------- */
  voz: [
    {
      number: "01",
      img: "assets/img/katherine-mansfield.jpg",
      alt: "Retrato de Katherine Mansfield",
      imgClass: "card-img-verde",
      title: "Katherine Mansfield",
      subtitle: "Episódio no Spotify",
      text: "Escritora neozelandesa de enorme importância para o modernismo de língua inglesa. Em seus contos, trabalhou com diversas representações de feminilidade e narrou um desejo ambíguo e confuso entre mulheres.",
      link: "#",
      soon: true
    },
    {
      number: "02",
      img: "assets/img/sylvia-molloy.jpg",
      alt: "Retrato de Sylvia Molloy",
      imgClass: "card-img-bege-dark",
      title: "Sylvia Molloy",
      subtitle: "Episódio no Spotify",
      text: "Escritora, ensaísta e crítica literária nascida na Argentina. Em Desarticulações, utiliza recortes de memória e fragmentos para narrar as visitas à sua ex-companheira que perde a memória devido ao Alzheimer.",
      link: "#",
      soon: true
    }
  ],

  /* ---- Carrossel de citações -------------------------------------------- */
  quotes: [
    {
      work: "Katherine Mansfield",
      quote: "“E as duas mulheres se deixaram ficar ali, lado a lado, olhando para a esguia árvore em flor. Embora imóvel, a árvore parecia estender-se para cima, subir, tremer no ar brilhante como a chama de uma vela, e crescer, crescer mais alto diante delas — quase tocar a borda da lua cheia prateada.”",
      author: "— Katherine Mansfield, Êxtase",
      img: "assets/img/katherine-mansfield.jpg",
      alt: "Katherine Mansfield",
      caption: "Katherine Mansfield, c. 1917",
      zoom: false
    },
    {
      work: "Sylvia Molloy",
      quote: "“Tenho que escrever estes textos enquanto ela ainda está viva, enquanto não houver morte ou encerramento, para tentar entender esse estar/não estar de uma pessoa que se desarticula diante dos meus olhos.”",
      author: "— Sylvia Molloy, Desarticulações",
      img: "assets/img/sylvia-molloy-text.jpg",
      alt: "Sylvia Molloy",
      caption: "Sylvia Molloy",
      zoom: true
    }
  ],

  /* ---- Lesbiel Indica: obras recomendadas ------------------------------ */
  indica: [
    {
      thumbText: "WATERMELON<br>WOMAN",
      thumbClass: "indica-thumb-verde",
      tag: "↘ Cinema",
      title: "Watermelon Woman",
      author: "Cheryl Dunye, 1996",
      text: "Primeiro filme americano dirigido por uma mulher negra lésbica. Uma cineasta amadora investiga a vida de uma atriz esquecida dos anos 30, inventando um passado que poderia ter existido.",
      link: "#"
    },
    {
      thumbText: "GERTRUDE<br>STEIN",
      thumbClass: "indica-thumb-bege-dark",
      tag: "↘ Literatura",
      title: "A autobiografia de Alice B. Toklas",
      author: "Gertrude Stein, 1933",
      text: "Escrita na voz de sua companheira, Stein narra sua própria vida com ironia e elegância, evocando o coração do modernismo em Paris e o círculo de Picasso, Matisse e Hemingway.",
      link: "#"
    },
    {
      thumbText: "RADCLYFFE<br>HALL",
      thumbClass: "indica-thumb-bege-mid",
      tag: "↘ Literatura",
      title: "O poço da solidão",
      author: "Radclyffe Hall, 1928",
      text: "Marco da literatura lésbica, o romance narra a história de Stephen Gordon, uma mulher que desde cedo reconhece sua diferença e busca um lugar em um mundo hostil.",
      link: "#"
    },
    {
      thumbText: "DESERT<br>HEARTS",
      thumbClass: "indica-thumb-verde",
      tag: "↘ Cinema",
      title: "Desert Hearts",
      author: "Donna Deitch, 1985",
      text: "Um dos primeiros filmes com representação lésbica que não termina em tragédia — uma professora universitária e uma mulher livre se encontram no Nevada dos anos 50.",
      link: "#"
    }
  ],

  /* ---- Texto: lista de textos completos -------------------------------- */
  /*  href aponta para a página do texto. Para novos textos, use um arquivo   */
  /*  copiado de text-template.html (ex.: novatexto.html) e linke aqui.        */
  textos: [
    { title: "Êxtase, Katherine Mansfield →", href: "katherine-mansfield.html" },
    { title: "Desarticulações, Sylvia Molloy →", href: "sylvia-molloy.html" }
  ],

  /* ---- Links (linktree próprio) ---------------------------------------- */
  /*  icon: "site" | "spotify" | "instagram" | "form"                        */
  links: [
    { label: "Site Lesbiel",                 icon: "site",     href: "https://lesbiel.com.br" },
    { label: "Spotify — Episódios em áudio", icon: "spotify",  href: "#", soon: true },
    { label: "Instagram",                    icon: "instagram", href: "https://www.instagram.com/lesb.iel" },
    { label: "Indicar uma autora",           icon: "form",     href: "indicar.html" }
  ]
};
