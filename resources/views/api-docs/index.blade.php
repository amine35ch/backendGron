<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API GRON - Documentation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swagger-ui-dist@5.1.0/swagger-ui.css">
    <style>
        html { box-sizing: border-box; overflow: -moz-scrollbars-vertical; overflow-y: scroll; }
        *, *:before, *:after { box-sizing: inherit; }
        body { margin: 0; padding: 0; background: #fafafa; }
        .topbar { background-color: #4a6c6f; padding: 10px 0; }
        .topbar-wrapper { display: flex; align-items: center; padding: 0 20px; }
        .topbar-title { color: white; font-size: 1.5em; margin-left: 10px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="topbar-wrapper">
            <div class="topbar-title">API GRON - Documentation</div>
        </div>
    </div>

    <div id="swagger-ui"></div>

    <script src="https://cdn.jsdelivr.net/npm/swagger-ui-dist@5.1.0/swagger-ui-bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swagger-ui-dist@5.1.0/swagger-ui-standalone-preset.js"></script>
    <script>
        window.onload = function() {
            const ui = SwaggerUIBundle({
                url: "http://backendgron.test/api/docs/json",
                dom_id: '#swagger-ui',
                deepLinking: true,
                validatorUrl: null,
                displayOperationId: true,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],
                layout: "StandaloneLayout",
                docExpansion: "list",
                defaultModelsExpandDepth: -1,
                displayRequestDuration: true,
                tryItOutEnabled: true,
                requestInterceptor: function(request) {
                    // Ajout d'en-têtes CORS ou autres modifications si nécessaire
                    return request;
                },
                responseInterceptor: function(response) {
                    // Traitement de la réponse si nécessaire
                    return response;
                },
                filter: true,
                syntaxHighlight: {
                    activate: true,
                    theme: "agate"
                }
            });
            window.ui = ui;
        };
    </script>
</body>
</html> 