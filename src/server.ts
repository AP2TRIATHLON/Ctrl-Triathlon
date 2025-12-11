import express from "express";
import type { Request, Response } from "express";
import authRoute from "./routes/auth.route.js";



const app = express();
const port = 3000;

app.use(express.json());

/*
  ===========================================================
  ======================== Routes ===========================
  ===========================================================
*/

app.use("/auth", authRoute)

app.get("/", (req: Request, res: Response) => {
  res.send("Hello from Express with TypeScript!");
});




/*                                                           
  ===========================================================
  ========================== APP ============================
  ===========================================================
*/

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
