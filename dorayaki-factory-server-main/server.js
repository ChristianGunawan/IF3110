const express = require('express');
const cors = require('cors');
const morgan = require('morgan');


const app = express();


app.use(express.json());
app.use(cors());

app.use(express.urlencoded({ extended: true }));
app.use(morgan('dev'));

// call routes
var route = require('./routes');
route(app);

app.use("/registerLogin")


let port = 3001;
app.listen(port, () => {
    console.log(`Server started on port ${port}`);
});