import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

// Get current file directory (ES modules equivalent of __dirname)
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Fonction utilitaire pour créer une requête
function createRequest(method, endpoint, body = null) {
  const request = {
    method,
    header: [
      {
        key: 'Accept',
        value: 'application/json'
      },
      {
        key: 'Authorization',
        value: 'Bearer {{access_token}}',
        type: 'text'
      }
    ],
    url: {
      raw: `{{base_url}}${endpoint}`,
      host: ['{{base_url}}'],
      path: endpoint.split('/').filter(p => p)
    }
  };

  if (body) {
    request.body = {
      mode: 'raw',
      raw: JSON.stringify(body, null, 2),
      options: {
        raw: {
          language: 'json'
        }
      }
    };
  }

  return request;
}

const collection = {
  info: {
    name: 'GRON API',
    description: 'Collection Postman pour l\'API GRON',
    schema: 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json'
  },
  item: [
    {
      name: '1. Endpoints d\'Authentification',
      item: [
        {
          name: 'Login',
          request: createRequest('POST', '/web/login', {
            email: '{{user_email}}',
            password: '{{user_password}}'
          })
        },
        {
          name: 'Logout',
          request: createRequest('PUT', '/web/logout')
        },
        {
          name: 'Get Logged User',
          request: createRequest('GET', '/logged-user')
        },
        {
          name: 'Verify Reset Key',
          request: createRequest('POST', '/verify-reset-key', {
            token: '{{reset_token}}'
          })
        },
        {
          name: 'Reset Password',
          request: createRequest('POST', '/reset-password', {
            token: '{{reset_token}}',
            password: 'new_password',
            password_confirmation: 'new_password'
          })
        },
        {
          name: 'Send Reset Link Email',
          request: createRequest('POST', '/send-reset-link-email-by-user', {
            email: '{{user_email}}'
          })
        }
      ]
    },
    {
      name: '2. Gestion des Entités',
      item: [
        {
          name: '2.1 Clients/Bénéficiaires',
          item: [
            {
              name: 'Liste des clients',
              request: createRequest('GET', '/web/clients')
            },
            {
              name: 'Créer un client',
              request: createRequest('POST', '/web/clients', {
                name: 'Nom du client',
                email: 'client@example.com'
              })
            },
            {
              name: 'Détails d\'un client',
              request: createRequest('GET', '/web/clients/{{client_id}}')
            },
            {
              name: 'Mettre à jour un client',
              request: createRequest('PUT', '/web/clients/{{client_id}}')
            },
            {
              name: 'Supprimer un client',
              request: createRequest('DELETE', '/web/clients/{{client_id}}')
            },
            {
              name: 'Ajouter des documents',
              request: createRequest('POST', '/web/clients/{{client_id}}/documents')
            }
          ]
        },
        {
          name: '2.2 Entreprises',
          item: [
            {
              name: 'Liste des entreprises',
              request: createRequest('GET', '/web/companies/{{identifier}}')
            },
            {
              name: 'Créer une entreprise',
              request: createRequest('POST', '/web/companies/{{identifier}}')
            },
            {
              name: 'Détails d\'une entreprise',
              request: createRequest('GET', '/web/companies/{{identifier}}/{{company_id}}')
            },
            {
              name: 'Mettre à jour une entreprise',
              request: createRequest('PUT', '/web/companies/{{identifier}}/{{company_id}}')
            },
            {
              name: 'Supprimer une entreprise',
              request: createRequest('DELETE', '/web/companies/{{identifier}}/{{company_id}}')
            }
          ]
        },
        {
          name: '2.3 Projets',
          item: [
            {
              name: 'Liste des projets',
              request: createRequest('GET', '/web/projects')
            },
            {
              name: 'Créer un projet',
              request: createRequest('POST', '/web/projects')
            },
            {
              name: 'Détails d\'un projet',
              request: createRequest('GET', '/web/projects/{{project_id}}')
            },
            {
              name: 'Mettre à jour un projet',
              request: createRequest('PUT', '/web/projects/{{project_id}}')
            },
            {
              name: 'Supprimer un projet',
              request: createRequest('DELETE', '/web/projects/{{project_id}}')
            },
            {
              name: 'Étape suivante',
              request: createRequest('PUT', '/web/projects/{{project_id}}/next-step')
            },
            {
              name: 'Étape précédente',
              request: createRequest('PUT', '/web/projects/{{project_id}}/prev-step')
            }
          ]
        }
      ]
    },
    {
      name: '3. Gestion du Catalogue',
      item: [
        {
          name: '3.1 Articles',
          item: [
            {
              name: 'Liste des articles',
              request: createRequest('GET', '/web/articles')
            },
            {
              name: 'Créer un article',
              request: createRequest('POST', '/web/articles')
            },
            {
              name: 'Détails d\'un article',
              request: createRequest('GET', '/web/articles/{{article_id}}')
            },
            {
              name: 'Mettre à jour un article',
              request: createRequest('PUT', '/web/articles/{{article_id}}')
            },
            {
              name: 'Supprimer un article',
              request: createRequest('DELETE', '/web/articles/{{article_id}}')
            }
          ]
        }
      ]
    },
    {
      name: '4. Gestion des Visites et Événements',
      item: [
        {
          name: 'Liste des visites',
          request: createRequest('GET', '/web/project-visits')
        },
        {
          name: 'Créer une visite',
          request: createRequest('POST', '/web/project-visits')
        },
        {
          name: 'Détails d\'une visite',
          request: createRequest('GET', '/web/project-visits/{{visit_id}}')
        },
        {
          name: 'Mettre à jour une visite',
          request: createRequest('PUT', '/web/project-visits/{{visit_id}}')
        }
      ]
    },
    {
      name: '5. Gestion des Documents',
      item: [
        {
          name: 'Télécharger un document projet',
          request: createRequest('GET', '/web/project-documents/{{document_id}}/download')
        },
        {
          name: 'Télécharger un document client',
          request: createRequest('GET', '/web/client-documents/{{document_id}}/download')
        }
      ]
    }
  ]
};

// Créer le dossier scripts s'il n'existe pas
if (!fs.existsSync('scripts')) {
  fs.mkdirSync('scripts');
}

// Sauvegarder la collection
fs.writeFileSync(
  path.join(__dirname, 'gron_postman_collection.json'),
  JSON.stringify(collection, null, 2)
);

// Générer les environnements
const environments = ['local', 'staging', 'production'].map(env => ({
  name: `GRON API - ${env.toUpperCase()}`,
  values: [
    {
      key: 'base_url',
      value: env === 'local' ? 'http://localhost:8000' : `https://api-${env}.gron.com`,
      type: 'string',
      enabled: true
    },
    {
      key: 'user_email',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'user_password',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'access_token',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'client_id',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'company_id',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'project_id',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'visit_id',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'document_id',
      value: '',
      type: 'string',
      enabled: true
    },
    {
      key: 'reset_token',
      value: '',
      type: 'string',
      enabled: true
    }
  ]
}));

// Sauvegarder les environnements
environments.forEach(env => {
  fs.writeFileSync(
    path.join(__dirname, `gron_postman_${env.name.toLowerCase()}.json`),
    JSON.stringify(env, null, 2)
  );
}); 