import { env_config } from "./api/v1/config/env";
import Logger from "./api/v1/utils/logger";
import app from "./app";


const port = env_config.API_PORT;


app.listen(port, () => {
  Logger.succes(`Server is running on http://localhost:${port}`);
});
