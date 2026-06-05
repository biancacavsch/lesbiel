# Guia de Segurança — Projeto Lesbiel

## 1. Proteger conta GitHub (FAZER AGORA)

### Ativar autenticação de dois fatores (2FA)
1. Acesse https://github.com/settings/security
2. Clique em "Enable two-factor authentication"
3. Use um app autenticador (Google Authenticator, Authy, ou 1Password)
4. Salve os códigos de recuperação em local seguro

### Proteger a branch main
1. Acesse https://github.com/biancacavsch/lesbiel/settings/branches
2. Clique em "Add rule"
3. Em "Branch name pattern" digite: `main`
4. Marque: "Require pull request reviews before merging"
5. Salve

### Revisar chaves de acesso
1. Acesse https://github.com/settings/keys
2. Remova chaves SSH que não são mais usadas
3. Acesse https://github.com/settings/tokens
4. Revogue tokens que não são mais necessários

---

## 2. Cloudflare (PRÓXIMO PASSO)

### Criar conta
1. Acesse https://dash.cloudflare.com/sign-up
2. Crie uma conta gratuita

### Adicionar domínio
1. Clique em "Add a site"
2. Digite: lesbiel.com.br
3. Selecione o plano gratuito
4. O Cloudflare vai mostrar nameservers
5. Acesse o Registro.br e troque os nameservers pelos do Cloudflare

### Ativar proxy (laranja)
1. No painel do Cloudflare, vá para DNS > Records
2. Para o registro CNAME de lesbiel:
   - Name: @ (ou lesbiel)
   - Target: biancacavsch.github.io
   - Proxy status: Proxied (botão laranja ativado)
3. Para o registro CNAME de www:
   - Name: www
   - Target: biancacavsch.github.io
   - Proxy status: Proxied

### Configurar SSL
1. Vá para SSL/TLS > Overview
2. Selecione "Full (strict)"

### Configurar headers de segurança
1. Vá para Rules > Transform Rules > Modify Response Header
2. Crie uma regra com os seguintes headers:

| Header | Value |
|--------|-------|
| X-Frame-Options | DENY |
| X-Content-Type-Options | nosniff |
| Referrer-Policy | strict-origin-when-cross-origin |
| Permissions-Policy | camera=(), microphone=(), geolocation=() |

---

## 3. Web3Forms (FORMULÁRIO)

### Criar conta
1. Acesse https://web3forms.com
2. Digite seu email e clique em "Create Free Access Key"
3. Verifique o email e copie a access key

### Usar no formulário
A access key será colocada no HTML do formulário de sugestões.
O Web3Forms envia as submissões por email e armazena no painel.

---

## 4. Checklist de Segurança

- [ ] 2FA ativado no GitHub
- [ ] Branch protection configurada
- [ ] Cloudflare configurado com proxy
- [ ] SSL ativo (Full strict)
- [ ] Headers de segurança configurados
- [ ] Web3Forms criado
- [ ] Formulário com honeypot implementado
- [ ] LGPD: política de privacidade no formulário
- [ ] Política de privacidade no site
