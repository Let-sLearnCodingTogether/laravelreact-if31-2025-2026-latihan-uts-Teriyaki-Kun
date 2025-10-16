import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "@css/style.css";
import QuotePage from "./pages/quotes/Quote";

createRoot(document.getElementById("root")).render(
  <StrictMode>
    <QuotePage />
  </StrictMode>,
);