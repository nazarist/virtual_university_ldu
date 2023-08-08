import { Bottom } from "./components/Bottom";
import { Home } from "./components/screens/home/Home";
import { FiAirplay } from "react-icons/fi";

function App() {
  return (
    <div className="mobile-version">
      <Home />
      <div>Content <FiAirplay /></div>
      <Bottom />
    </div>
  );
}

export default App;
