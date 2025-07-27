@component('mail::message')
# Bem-vindo, {{ $usuario->nome }}! 👋

É um prazer ter você na **Casa dos Salgados**!

Agora que você faz parte da nossa comunidade, poderá:
- Realizar e acompanhar seus pedidos com facilidade 🧾  
- Consultar o cardápio completo 🍽️  
- Acompanhar o status em tempo real ⏱️

Estamos aqui para garantir a melhor experiência para você.

@component('mail::button', ['url' => url('/')])
Acessar o sistema
@endcomponent

Se tiver qualquer dúvida ou sugestão, estamos à disposição.

Até logo!  
**Equipe Casa dos Salgados**
@endcomponent
