const cadAdmForm = document.getElementById("cadAdm");

if (cadAdmForm) {
    cadAdmForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const dadosForm = new FormData(cadAdmForm);

        try {
            const dados = await fetch("cad.php", {
                method: "POST",
                body: dadosForm
            });

            const resposta = await dados.json();

            if (resposta['status']) {
                Swal.fire({
                    html: resposta['msgerror'],
                    showConfirmButton: false,
                    showCloseButton: true,
                    position: "top",
                    background: '#FA8072',
                    customClass: {
                        popup: 'custom-popup-class',
                        content: 'custom-content-class',
                        container: 'custom-container-class',

                    }

                    
                });

                setTimeout(function () {
                    Swal.close().style.display = 'none';
                }, 3000);

            }  else {
                Swal.fire({
                    title: "Cadastro confirmado,",
                    html: "<h5>deseja realizar um novo cadastro ?</h5>",
                    icon: 'success',
                    position: 'top',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não',
                    confirmButtonColor: "#3085d6",
                    customClass: {
                        popup: 'custom-confirm-class',
                        content: 'custom-content-class',
                        container: 'custom-container-class',
                    }
                })
            
                .then((result) => {
                    // Verifica se o botão "Não" foi clicado
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        // Fecha a modal
                        const modalCadAdm = document.getElementById('modalCadAdm');
                        const modalInstance = bootstrap.Modal.getInstance(modalCadAdm);
                        modalInstance.hide();
            
                        
                        
                       
                    }
                });
            }

            // Exibir mensagem de erro de senha, se aplicável
            if (resposta['status'] && resposta['msgsenha']) {
                Swal.fire({
                    html: resposta['msgsenha'],
                    showConfirmButton: false,
                    showCloseButton: true,
                    position: "top",
                    background: '#FA8072',
                    customClass: {
                        popup: 'custom-popup-class',
                        content: 'custom-content-class',
                        container: 'custom-container-class',
                    }
                });

                // Limpar o campo de senha apenas se não houver erro de senha
                document.querySelector("#inputSenhaAdm").value = '';

                setTimeout(function () {
                    Swal.close().style.display = 'none';
                }, 3000);
            }
            else{
                document.getElementById("cadAdm").reset();   
            }

        } catch (error) {
            console.error('Erro ao processar a requisição:', error);
        }
    });
}

