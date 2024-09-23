<div class="main-content" id="main-content">
    <div class="card">
        <div class="card-header">
            <?php echo mb_convert_case($veiculo['tipo'], MB_CASE_TITLE, "UTF-8");?>
        </div>
        <div class="card-body">
            <?php echo $veiculo['link'] ?>
            <br>
            <h5 class="card-title"><?php echo $veiculo['id'] ?>. <?php echo $veiculo['nome'];?></h5>
            <div class="alert alert-warning" role="alert">
                Alerta: O código abaixo é apenas um exemplo de como incorporar o veículo em seu site. Para obter o código com partes personalizadas, incopore pela API.
            </div>
            <pre class="code-block">
                <code id="codeToCopy">
                    <?php echo htmlspecialchars($veiculo['link']) ?>
                </code>
            </pre>
            <div>
                <button id="copyBtn" class="btn btn-primary"><i class="ph ph-puzzle-piece"></i> Incorporar</button>
            </div>
            <br>
            <a href="<?php echo base_url('veiculos') ?>"><i class="ph ph-caret-left"></i> Voltar</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('copyBtn').addEventListener('click', function() {
        var codeElement = document.getElementById('codeToCopy');

        var tempTextArea = document.createElement('textarea');
        tempTextArea.value = codeElement.textContent;
        document.body.appendChild(tempTextArea);

        tempTextArea.select();
        document.execCommand('copy');

        document.body.removeChild(tempTextArea);

        alert('Código copiado para a área de transferência!');
    });
</script>

<style>
    .code-block {
        background-color: #f4f4f4;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        overflow-x: auto;
        font-family: monospace;
        white-space: pre-wrap;
    }

    .code-block iframe {
        display: none;
    }

    iframe {
        width: 100%;
        height: 200px;
        border-radius: 10px;
    }
</style>