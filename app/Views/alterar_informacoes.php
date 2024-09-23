<div class="main-content" id="main-content">
    <?php if (session()->get('assinatura') === '1' || session()->get('assinatura') === '2') { ?>

        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="ph ph-pen"></i> Alterar Informações</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Preencha os campos</h6>
                <br>
                <div class="card token-card">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input autocomplete="name" type="text" value="<?php echo session()->user ?>"  class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input autocomplete="email" type="email" value="<?php echo session()->email ?>" class="form-control" id="email" name="email" placeholder="nome@email.com" required>
                    </div>
                </div>

                <button onclick="alterarInformacoes()" class="btn btn-primary"><i class="ph ph-floppy-disk"></i> Salvar Alterações </button>
            </div>
            <br>
            <a href="<?php echo base_url('conta') ?>"><i class="ph ph-caret-left"></i> Voltar</a>
        </div>

        <script>
            function alterarInformacoes() {
                var nome = document.getElementById('nome').value;
                var email = document.getElementById('email').value;

                fetch('<?php echo base_url('api/alterar_informacoes') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nome: nome,
                        email: email
                    })
                }).then(response => response.json())
                    .then(data => {
                        if (data.status == 'success') {
                            alert('Informações alteradas com sucesso!');
                            window.location.href = '<?php echo base_url('conta') ?>';
                        } else {
                            alert('Erro ao alterar informações!');
                        }
                    })
            }
        </script>

    <?php } else { ?>

        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="ph ph-star"></i> Tenha Acesso Completo!</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Acesso ilimitado a todos os veiculos</h6>
                <br>
                <p class="card-text">Aproveite todas as funcionalidades da api mais completa de Veiculos com visualização 3D.</p>
                <div style="display: flex; justify-content:center; align-items: center; width: 100%;">
                    <stripe-buy-button
                        buy-button-id="buy_btn_1PvrfvHBn7GJcEdF4gMfrILC"
                        publishable-key="pk_live_51O7kFlHBn7GJcEdFZqoUid0qBvgoLuCovROYv0nIt43mkSK6LoeTufLbGwiAviu0o1mQefj5UQ6pf30CSsKG8xMb00OiFRCc2o">
                    </stripe-buy-button>
                </div>
            </div>
        </div>

        <script async
            src="https://js.stripe.com/v3/buy-button.js">
        </script>

    <?php } ?>

</div>