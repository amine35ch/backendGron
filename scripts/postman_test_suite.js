// Tests communs pour tous les endpoints
export const commonTests = `
// Vérifier le statut de la réponse
pm.test("Status code est 200 ou 201", function () {
    pm.expect(pm.response.code).to.be.oneOf([200, 201]);
});

// Vérifier le format de la réponse
pm.test("Response est en JSON", function () {
    pm.response.to.have.header("Content-Type");
    pm.expect(pm.response.headers.get("Content-Type")).to.include("application/json");
});

// Vérifier la structure de la réponse
pm.test("Response a la structure attendue", function () {
    const jsonData = pm.response.json();
    pm.expect(jsonData).to.be.an('object');
    pm.expect(jsonData).to.have.property('success');
    if (jsonData.success === true) {
        pm.expect(jsonData).to.have.property('data');
    } else {
        pm.expect(jsonData).to.have.property('message');
    }
});

// Vérifier le temps de réponse
pm.test("Temps de réponse acceptable", function () {
    pm.expect(pm.response.responseTime).to.be.below(1000);
});
`;

// Tests spécifiques pour l'authentification
export const authTests = {
    login: `
    ${commonTests}
    
    pm.test("Login réussi", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
        pm.expect(jsonData.data).to.have.property('access_token');
        
        // Sauvegarder le token pour les autres requêtes
        if (jsonData.data.access_token) {
            pm.environment.set('access_token', jsonData.data.access_token);
        }
    });
    `,
    logout: `
    ${commonTests}
    
    pm.test("Logout réussi", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
        
        // Nettoyer le token
        pm.environment.unset('access_token');
    });
    `
};

// Tests pour les endpoints CRUD
export const crudTests = {
    list: `
    ${commonTests}
    
    pm.test("Liste retournée", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
        pm.expect(jsonData.data).to.be.an('array');
    });
    `,
    create: `
    ${commonTests}
    
    pm.test("Création réussie", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
        pm.expect(jsonData.data).to.be.an('object');
        
        // Sauvegarder l'ID pour les tests suivants
        if (jsonData.data.id) {
            pm.environment.set('last_created_id', jsonData.data.id);
        }
    });
    `,
    update: `
    ${commonTests}
    
    pm.test("Mise à jour réussie", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
        pm.expect(jsonData.data).to.be.an('object');
    });
    `,
    delete: `
    ${commonTests}
    
    pm.test("Suppression réussie", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
    });
    `
};

// Tests pour les endpoints de documents
export const documentTests = {
    upload: `
    ${commonTests}
    
    pm.test("Upload réussi", function () {
        const jsonData = pm.response.json();
        pm.expect(jsonData.success).to.be.true;
        pm.expect(jsonData.data).to.have.property('file_path');
    });
    `,
    download: `
    pm.test("Download réussi", function () {
        pm.expect(pm.response.code).to.equal(200);
        pm.expect(pm.response.headers.get("Content-Type")).to.include("application/");
    });
    `
}; 