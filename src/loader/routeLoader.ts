import { Application, Router } from "express";
import fs from "fs";
import path from "path";
import Logger from "../api/v1/utils/logger";

export const routesLoader = (app: Application) => {
  const basePath = path.join(__dirname, "../api/v1/routes");

  const walk = (dir: string, prefix = "") => {
    const files = fs.readdirSync(dir);

    files.forEach((file) => {
      const fullPath = path.join(dir, file);
      const stat = fs.statSync(fullPath);

      if (stat.isDirectory()) {
        // On descend dans le sous-dossier
        walk(fullPath, `${prefix}/${file}`);
      }

      if (stat.isFile() && file.endsWith(".routes.ts")) {
        const routePath = `${prefix}/${file.replace(".routes.ts", "")}`;

        const router = require(fullPath).default as Router;

        app.use(`/api/v1${routePath}`, router);

        Logger.succes(`Loaded route: /api/v1${routePath}`);
      }
    });
  };
  

  walk(basePath);
};
