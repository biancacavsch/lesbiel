# Guia de Segurança — Projeto Lesbiel

Este guia descreve as medidas de segurança aplicadas ao site do projeto de extensão
"Lesbiel" (Universidade Estadual de Campinas), publicado em `lesbiel.com.br`.

O site é **estático** (HTML/CSS/JS), versionado no GitHub e publicado no **Cloudflare Pages**.
Em tempo de execução ele não depende do GitHub: após o deploy, é servido pela CDN global
da Cloudflare, o que já confere redundância e disponibilidade.

---

## 1. Conta GitHub (repositório do código)

O código-fonte está em https://github.com/biancacavsch/lesbiel. O GitHub é usado apenas
para versionamento e para disparar o deploy; a queda eventual do GitHub não derruba o site.

- Ativar 2FA em https://github.com/settings/security
- Proteger a branch `main` (exigir revisão de PR antes de merge)
- Revisar chaves SSH e tokens em https://github.com/settings/keys e /tokens

---

## 2. Cloudflare (DNS, CDN, SSL e hospedagem)

### Registro do domínio
- Domínio registrado no Registro.br: `lesbiel.com.br`
- Nameservers delegados para a Cloudflare (primeira delegação leva até ~2h na Registro.br)

### Cloudflare Pages (hospedagem)
O site estático é publicado no Cloudflare Pages. Arquivos de configuração na raiz:
- `wrangler.toml` — define o projeto (`name = "lesbiel"`) e o diretório de saída (`pages_build_output_dir = "."`, pois os arquivos ficam na raiz).
- Deploy via Git (conectar o repositório) ou via CLI: `npx wrangler pages deploy .`
- Custom domains: `lesbiel.com.br` e `www.lesbiel.com.br` → CNAME para `lesbiel.pages.dev`, com **proxy laranja** ativado.

### Cabeçalhos de segurança (`_headers`)
Aplicados na borda (edge) da Cloudflare para todas as páginas (`/*`):
- `X-Frame-Options: DENY` — impede que o site seja exibido em iframes (clickjacking)
- `X-Content-Type-Options: nosniff` — evita que o navegador "adivinhe" o tipo de arquivo
- `Referrer-Policy: strict-origin-when-cross-origin` — limita o vazamento de URL em referrers
- `Permissions-Policy: camera=(), microphone=(), geolocation=()` — desliga APIs sensíveis
- `Strict-Transport-Security` — força HTTPS (HSTS)

### Redirecionamentos (`_redirects`)
- `www.lesbiel.com.br → lesbiel.com.br` (301) — canonização do domínio.

### SSL/TLS
- Modo: **Full (strict)**.

### Políticas de bots (IA)
Configuradas no onboarding do domínio na Cloudflare:
- **Search:** permitido (indexação em buscadores)
- **Agent:** permitido
- **Training:** bloqueado (ver `robots.txt` abaixo e o toggle do próprio Cloudflare)

---

## 3. robots.txt (bloqueio de treino de IA)

Arquivo na raiz, servido em `/robots.txt`. Permite buscadores (Google, Bing) e bloqueia
crawlers conhecidos de treinamento de modelos de IA: `GPTBot`, `Google-Extended`, `CCBot`,
`anthropic-ai`, `ClaudeBot`, `omgilibot`, `omgili`.

Observação: `robots.txt` é um sinal **voluntário** — bots mal-intencionados podem ignorá-lo.
O toggle "Block training" do Cloudflare reforça isso na borda, mas também não é garantido.
É a postura padrão de proteção de conteúdo autoral.

---

## 4. Web3Forms (formulário de indicação)

O formulário (`indicar.html`) envia pelo Web3Forms:
- `access_key` em `indicar.html` (chave **pública** por design — não é vazamento)
- Honeypot implementado (campo oculto para bots)
- Verificação de tempo anti-bot e consentimento (LGPD) antes do envio

---

## 5. Checklist de Segurança

- [ ] 2FA ativado no GitHub
- [ ] Branch protection configurada
- [ ] Domínio no Registro.br com nameservers da Cloudflare
- [ ] Cloudflare Pages com custom domains ativos
- [ ] SSL ativo (Full strict)
- [ ] `_headers` aplicados (cabeçalhos de segurança)
- [ ] `_redirects` (www → apex)
- [ ] `robots.txt` com bloqueio de treino de IA
- [ ] Política de privacidade no site (`privacidade.html`)
