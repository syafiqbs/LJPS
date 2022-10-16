import {BrowserRouter, Routes, Route} from 'react-router-dom';
import SkillList from "./components/SkillList";
import AddSkill from "./components/AddSkill";
import EditSkill from "./components/EditSkill";
import Homepage from './components/Homepage';
import 'bootstrap/dist/css/bootstrap.min.css';

function App() {
  return (
    <BrowserRouter>
    <Routes>
      <Route path="/" element={<Homepage/>}/>
      <Route path="/skill-list" element={<SkillList/>}/>
      <Route path="/skill/add" element={<AddSkill/>}/>
      <Route path="/skill/edit/:id" element={<EditSkill/>}/>
    </Routes>
    </BrowserRouter>
  )
}

export default App;
