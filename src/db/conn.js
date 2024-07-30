const mongoose=require("mongoose")
mongoose.connect("mongodb://localhost:27017/Registrations",{
    useNewUrlParser:true,
    useUnifiedTopology:true,
    useCreateIndex:true
}).then(()=>{
    console.log('Connection Successfull!');
}).catch(()=>{
    console.log('Connection Unsuccessful');
})