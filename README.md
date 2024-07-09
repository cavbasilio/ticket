# Cronômetro HTML/JavaScript

Este é um exemplo de um cronômetro simples implementado em HTML e JavaScript. O cronômetro exibe horas, minutos, segundos e décimos de segundo, permitindo iniciar, pausar e resetar a contagem. Abaixo, você encontrará informações sobre como usar e entender o código deste cronômetro.

## Uso

Para usar o cronômetro, siga os passos abaixo:

1. Abra o arquivo HTML no seu navegador.

2. Clique no botão "Ligar Cronômetro" para iniciar a contagem.

3. Você pode pausar a contagem clicando no botão "Pausar Cronômetro". O texto do botão mudará para "Retomar Cronômetro" quando pausado.

4. Se desejar reiniciar o cronômetro, clique no botão "Resetar".

## Código

Aqui está uma breve explicação do código presente no arquivo HTML e JavaScript:

### HTML (index.html)

- `<h1>Cronômetro</h1>`: Título da página.

- `<p id="cronometro">00:00:00.0</p>`: Parágrafo onde o cronômetro é exibido.

- `<button id="btnLigar">Ligar Cronômetro</button>`: Botão para iniciar o cronômetro.

- `<button id="btnPausar">Pausar Cronômetro</button>`: Botão para pausar e retomar o cronômetro.

- `<button id="btnResetar">Resetar</button>`: Botão para resetar o cronômetro.

- `<script src="main.js"></script>`: Inclui o arquivo JavaScript que contém a lógica do cronômetro.

### JavaScript (main.js)

- `const btnLigar`, `btnPausar`, `btnResetar`, e `cronometro`: Selecionam os elementos HTML relevantes por meio de seus IDs.

- `let decSeg = 0;`: Variável para controlar os décimos de segundo.

- `let contando;`: Variável de controle para verificar se o cronômetro está em execução ou pausado.

- `let idContagem;`: Variável para armazenar o identificador do intervalo.

- `mostraCronometro()`: Função que atualiza a exibição do cronômetro com horas, minutos, segundos e décimos de segundo.

- Evento `click` no botão "Ligar Cronômetro": Inicia o cronômetro e atualiza o texto do botão de pausa/retomada.

- Evento `click` no botão "Pausar Cronômetro": Pausa ou retoma o cronômetro, dependendo do estado atual.

- Evento `click` no botão "Resetar": Pausa o cronômetro e reinicia a exibição para 00:00:00.0.

Este é um cronômetro simples que demonstra como iniciar, pausar e resetar uma contagem de tempo em JavaScript. Você pode usar esse código como base para criar cronômetros mais complexos ou incorporar a funcionalidade de acordo com suas necessidades.