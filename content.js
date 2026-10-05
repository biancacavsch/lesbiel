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
      text: "Escritora neozelandesa de enorme importância para o modernismo de língua inglesa. Em seus contos, trabalhado com diversas representações de feminilidade e narrou um desejo ambíguo e confuso entre mulheres.",
      link: "https://open.spotify.com/episode/6DZ06yDV5CeFYI8AKCNhV1?si=03ab9b8154ee410e"
    },
    /* ============================================================
       CARDS TEMPORARIAMENTE OCULTOS — episódios ainda não lançados.
       Para publicar um episódio: remova o bloco do autor daqui,
       cole-o de volta no array (ordem numérica) e troque
       link: "#" + soon: true pelo URL real do Spotify.
       Depois rode: node build.js
       ============================================================
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
    },
    {
      number: "03",
      img: "assets/img/adrienne-rich.jpg",
      alt: "Retrato de Adrienne Rich",
      imgClass: "card-img-verde",
      title: "Adrienne Rich",
      subtitle: "Episódio no Spotify",
      text: "Poetisa e ensaísta americana (1929–2012), referência no feminismo e no lesbianismo. Autora de mais de vinte volumes de poesia e prosa.",
      link: "#",
      soon: true
    },
    {
      number: "04",
      img: "assets/img/cristina-peri-rossi.jpg",
      alt: "Retrato de Cristina Peri Rossi",
      imgClass: "card-img-bege-dark",
      title: "Cristina Peri Rossi",
      subtitle: "Episódio no Spotify",
      text: " Escritora uruguaia (1941), poetisa e narradora. Desde sua primeira publicação em 1971, traz erotismo lésbico à literatura, causando escândalo e censura. Exilada na Espanha e Paris.",
      link: "#",
      soon: true
    },
    {
      number: "05",
      img: "assets/img/maria-firmina-dos-reis.jpg",
      alt: "Retrato de Maria Firmina dos Reis",
      imgClass: "card-img-verde",
      title: "Maria Firmina dos Reis",
      subtitle: "Episódio no Spotify",
      text: "Romancista e poetisa maranhense (1820s–1917). Atuou pela educação universal, abolição da escravidão e igualdade racial. Sua obra inclui poemas homoeróticos e trechos do romance Úrsula.",
      link: "#",
      soon: true
    },
    {
      number: "06",
      img: "assets/img/monique-wittig.jpg",
      alt: "Retrato de Monique Wittig",
      imgClass: "card-img-bege-dark",
      title: "Monique Wittig",
      subtitle: "Episódio no Spotify",
      text: "Teórica feminista e ativista lésbica francesa (1935–2003). Em 1969 publicou As guerrilheiras, fundamental para o feminismo lésbico e investigação de linguagem, sexo e poder.",
      link: "#",
      soon: true
    },
    {
      number: "07",
      img: "assets/img/natalia-borges-polesso.jpg",
      alt: "Retrato de Natália Borges Polesso",
      imgClass: "card-img-verde",
      title: "Natália Borges Polesso",
      subtitle: "Episódio no Spotify",
      text: " Escritora brasileira, autora de A extinção das abelhas (2021). Explora memória, luto e cotidiano em condomínios com prosa que mistura real e onírico.",
      link: "#",
      soon: true
    },
    {
      number: "08",
      img: "assets/img/val-flores.jpg",
      alt: "Retrato de Val Flores",
      imgClass: "card-img-bege-dark",
      title: "Val Flores",
      subtitle: "Episódio no Spotify",
      text: " Escritora, feminista e performer lésbica queer argentina (1973). Autora de Interruqciones (2013) e Deslenguada (2010), entre outros ensaios sobre poética ativista.",
      link: "#",
      soon: true
    }
    */
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
    },
    {
      work: "Adrienne Rich",
      quote: "“Não podemos nos permitir acreditar que o silêncio seja ouro. O silêncio é a condição de possibilidade da opressão. Falar é resistir.”",
      author: "— Adrienne Rich, Of Woman and Sword",
      img: "assets/img/adrienne-rich.jpg",
      alt: "Adrienne Rich",
      caption: "Adrienne Rich, 1979",
      zoom: false
    },
    {
      work: "Cristina Peri Rossi",
      quote: "“Uma mulher me dança nos ouvidos palavras da infância eu a escuto mansamente a observo a observo cerimoniosamente e se ela diz fumaça se diz peixe que pegamos com a mão se ela diz meu pai minha mãe meus irmãos sinto deslizar desde a antiguidade uma coisa indefinível melaço de palavras uma vez que ela falando me conquistou e assim me tem presa em minhas letras em suas sílabas e consoantes como se a tivesse penetrada.”",
      author: "— Cristina Peri Rossi, Evoé (1971)",
      img: "assets/img/cristina-peri-rossi.jpg",
      alt: "Cristina Peri Rossi",
      caption: "Cristina Peri Rossi, c. 1970",
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
    { title: "Katherine Mansfield →", href: "katherine-mansfield.html" },
    { title: "Sylvia Molloy →", href: "sylvia-molloy.html" },
    { title: "Adrienne Rich →", href: "adrienne-rich.html" },
    { title: "Cristina Peri Rossi →", href: "cristina-peri-rossi.html" },
    { title: "Maria Firmina dos Reis →", href: "maria-firmina-dos-reis.html" },
    { title: "Monique Wittig →", href: "monique-wittig.html" },
    { title: "Natália Borges Polesso →", href: "natalia-borges-polesso.html" },
    { title: "Val Flores →", href: "val-flores.html" }
  ],

/* ---- Links (linktree próprio) ---------------------------------------- */
  /*  icon: "site" | "spotify" | "instagram" | "form"                        */
  links: [
    { label: "Site Lesbiel",                 icon: "site",     href: "https://lesbiel.com.br" },
    { label: "Spotify — Episódios em áudio", icon: "spotify",  href: "#",      soon: true },
    { label: "Instagram",                    icon: "instagram", href: "https://www.instagram.com/lesb.iel" },
    { label: "Indicar uma autora",           icon: "form",     href: "indicar.html" }
  ]
};
