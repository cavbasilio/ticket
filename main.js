

function setupCronometro(btnLigarId, btnPararId, resultadoId) {
    let ticketId = null;
    const btnLigar = document.getElementById(btnLigarId);
    const btnParar = document.getElementById(btnPararId);
    const resultado = document.getElementById(resultadoId);

    btnLigar.addEventListener('click', () => {
        fetch('ticketManager.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=start'
        })
        .then(response => response.text())
        .then(data => {
            console.log('Raw response:', data);
            try {
                const jsonData = JSON.parse(data);
                if (jsonData.id) {
                    ticketId = jsonData.id;
                    btnParar.disabled = false;
                    btnLigar.disabled = true;
                } else {
                    console.error('Erro ao iniciar o ticket:', jsonData.error);
                }
            } catch (e) {
                console.error('Erro ao processar JSON:', e);
            }
        })
        .catch(error => console.error('Erro:', error));
    });

    btnParar.addEventListener('click', () => {
        if (ticketId !== null) {
            fetch('ticketManager.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'action=stop'
            })
            .then(response => response.text())
            .then(data => {
                console.log('Raw response:', data);
                try {
                    const jsonData = JSON.parse(data);
                    if (jsonData.message) {
                        resultado.innerText = jsonData.message;
                        btnParar.disabled = true;
                        btnLigar.disabled = false;
                        ticketId = null;
                    } else {
                        console.error('Erro ao parar o ticket:', jsonData.error);
                    }
                } catch (e) {
                    console.error('Erro ao processar JSON:', e);
                }
            })
            .catch(error => console.error('Erro:', error));
        }
    });
}

setupCronometro('btnLigar1', 'btnParar1', 'resultado1');
setupCronometro('btnLigar2', 'btnParar2', 'resultado2');
setupCronometro('btnLigar3', 'btnParar3', 'resultado3');
