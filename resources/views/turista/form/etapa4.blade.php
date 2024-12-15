<div class="form-step" id="step4" style="display: none; text-align: center; margin-top: 3rem;">
    <div id="timerDisplay" style="font-size: 18px; margin-top: 1rem;">Seu <strong>QR Code</strong> vai expirar em 5:00 minutos</div>
    <p id="paymentStatus" style="font-size: 18px; color: green;"></p>
    <img id="qrCodeImage" src="" alt="QR Code" style="display: none; width: 250px;">
    <p id="qrCodeText" style="display: none; text-align: center; margin-top: 2rem">
        Aponte sua câmera para o <strong>QR Code</strong> ou copie o código
    </p>
    <div style="display: inline-block; width: 100%; max-width: 600px;">
        <textarea id="pixCode" readonly="" rows="4"
                  style="display: inline; margin-top: 1rem; width: 100%;
                padding: 10px; border-radius: 5px; border: 1px solid #ccc;
                font-size: 14px; resize: none; text-align: center;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        </textarea>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-login centralizar-texto" id="copyPixButton" style="margin-top: 1rem; width: 15rem; align-items: center;">Copiar Código Pix</button>
        </div>
        <div class="d-flex justify-content-center">
            <button onclick="redirectToHome()" class="btn btn-primary btn-login centralizar-texto" style="margin-top: 1rem; width: 15rem;">Voltar para Página Inicial</button>
        </div>
    </div>
</div>
<script src="{{ asset('js/turista/form/botao-copiar-pix.js') }}"></script>
<script>
    function redirectToHome() {
        const authToken = "{{ $token }}";
        const slug = "{{ $slug }}";
        const baseURL = `${window.location.protocol}//${window.location.host}`;

        window.location.href = `${baseURL}/${slug}/signin/${authToken}`;
    }
</script>
