import sql from "mssql";
import {env_config} from "./env";


export const sql_config: sql.config = {
    user: env_config.DB_USER,
    password: env_config.DB_PASSWORD,
    server: env_config.DB_SERVER,    // ou l’IP du serveur
    database: env_config.DB_DATABASE,
    options: {
        encrypt: false,
        trustServerCertificate: true
    }
};

async function getPool() {
    const pool = await sql.connect(sql_config);
    return pool;
};



