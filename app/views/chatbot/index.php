<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        Chatbot AI
                    </h4>

                </div>

                <div class="card-body">

                    <div id="chat-box"
                        class="border rounded p-3 mb-3"
                        style="
                        height: 400px;
                        overflow-y: auto;
                        background: #f8f9fa;
                    ">
                    </div>

                    <div class="input-group">

                        <input type="text"
                            id="prompt"
                            class="form-control"
                            placeholder="Tanyakan sesuatu...">

                        <button class="btn btn-primary"
                            onclick="sendMessage()">

                            Kirim

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    async function sendMessage() {
        const promptInput =
            document.getElementById('prompt');

        const prompt = promptInput.value;

        if (prompt.trim() === '')
            return;

        const chatBox =
            document.getElementById('chat-box');

        // Bubble User
        chatBox.innerHTML += `
        <div class="text-end mb-3">

            <span class="badge bg-primary p-2 text-wrap">
                ${prompt}
            </span>

        </div>
    `;

        promptInput.value = '';

        // Loading
        chatBox.innerHTML += `
        <div id="loading" class="mb-3">

            <span class="badge bg-secondary p-2">
                Bot sedang mengetik...
            </span>

        </div>
    `;

        chatBox.scrollTop =
            chatBox.scrollHeight;

        try {

            const response = await fetch(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=AIzaSyCzwRu2kAv_cNdcLv_VzL8RQKmhsmpoUh0', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify({

                        contents: [{
                            parts: [{
                                text: prompt
                            }]
                        }]

                    })
                });

            const data = await response.json();

            document
                .getElementById('loading')
                .remove();

            let reply =
                'Tidak ada response';

            try {

                reply =
                    data.candidates[0]
                    .content.parts[0].text;

            } catch (error) {}

            // Bubble AI
            chatBox.innerHTML += `
                <div class="mb-3 d-flex">

                    <div class="bg-white border rounded shadow-sm p-3"
            style="
            max-width: 85%;
            white-space: pre-wrap;
            line-height: 1.7;
        ">

            <div class="fw-bold text-success mb-1">
                Chatbot AI
            </div>

            ${formatText(reply)}

        </div>

    </div>
`;

            function formatText(text) {
                return text

                    // Bold markdown
                    .replace(/\*\*(.*?)\*\*/g, '<b>$1</b>')

                    // Bullet point
                    .replace(/^\* (.*$)/gm, '• $1')

                    // Enter
                    .replace(/\n/g, '<br>');
            }

            chatBox.scrollTop =
                chatBox.scrollHeight;

        } catch (error) {

            alert('Error koneksi Chatbot API');
        }
    }
</script>