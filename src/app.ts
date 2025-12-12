import express from "express";
import { routesLoader } from "./loader/routeLoader";

const app = express();

app.use(express.json());

// Chargement automatique des routes
routesLoader(app);

export default app;


