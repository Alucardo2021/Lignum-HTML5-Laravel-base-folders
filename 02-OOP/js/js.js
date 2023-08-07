
class Actor{
  constructor(Nombre, Edad){
    this.Nombre = Nombre;
    this.Edad = Edad;
  }
}

class EventEmitter{
  constructor(){
    this.eventos = [];
  }
  
  on(eventoNombre,callback){
    if(!this.eventos[eventoNombre]){
      this.eventos[eventoNombre] = [];
    }
    this.eventos[eventoNombre].push(callback);
  }
  
  emit(eventoNombre){
      if(this.eventos[eventoNombre]){
        this.eventos[eventoNombre].forEach(callback => callback());
    }

  }
  
  off(eventoNombre,callback){
    if(this.eventos[eventoNombre]){
        this.eventos[eventoNombre] = this.eventos[eventoNombre].filter(call => call !== callback);
    }
  }
}


class Pelicula extends EventEmitter {
  constructor(nombre, año, duracion) {
    super();
    this.titulo = nombre;
    this.año = año;
    this.duracion = duracion;
    this.cast = [];
  }
  
  play(){
    let log = new Logger();
    log.log("The play event has been emitted")
    this.emit("play")
  }
  pause(){
    let log = new Logger();
    log.log("The pause event has been emitted")
    this.emit("pause")
  }
  resume(){
    let log = new Logger();
    log.log("The resume event has been emitted")
    this.emit("resume")
  }
  
  addCast(actor){
    if(actor instanceof Array ){
      actor.forEach(a => this.addCast(a));
    }
    if(actor instanceof Actor){
      this.cast.push(actor);
      
      let log = new Logger();
      log.log("Se agregó a"+ actor.Nombre +" a la palicula"+ this.titulo)
    }
  }
}

class Logger{
  constructor(){
  }

  log(info){
    console.log(info)
  }
}