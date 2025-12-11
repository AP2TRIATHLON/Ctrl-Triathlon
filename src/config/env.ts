

export const env_config = {
    API_URL: process.env.API_URL || "http://localhost",
    API_PORT: process.env.API_PORT || 3000,

    DB_SERVER: process.env.DB_SERVER || "192.168.0.0",
    DB_PORT: process.env.DB_PORT || "3306",
    DB_DATABASE: process.env.DB_DATABASE || "?",
    DB_USER: process.env.DB_USER || "root",
    DB_PASSWORD: process.env.DB_PASSWORD || "",
};


