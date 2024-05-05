const mysql = require('mysql2');

const conection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'sitereceitas',
    password: ''
});

conection.connect( function(err) {
    console.log("Conexão deu certo");
});

conection.query("SELECT * FROM receitas", function(err, rows, fields){
    if(!err){
        console.log("Resultado: ", rows);
    }
    else{
        console.log("Algo deu errado");
    }
});

const fs = require('fs');

// Função para ler o arquivo TXT e retornar as receitas
function lerArquivoTxt(nomeArquivo) {
    const conteudo = fs.readFileSync(nomeArquivo, 'utf-8');

    const linhas = conteudo.split('\r\n');
    const receitas = [];
    let receitaAtual = {};

    linhas.forEach(linha => {
        if (linha.startsWith('@receita')) {
            if (Object.keys(receitaAtual).length !== 0) {
                receitas.push(receitaAtual);
            }
            receitaAtual = {};
        } else {
            const [chave, valor] = linha.split(': ');
            receitaAtual[chave] = valor;
        }
    });

    // Adiciona a última receita
    if (Object.keys(receitaAtual).length !== 0) {
        receitas.push(receitaAtual);
    }

    return receitas;
}

// Uso da função para ler o arquivo e obter as receitas
const receitas = lerArquivoTxt('receitas.txt');

// Função para inserir uma receita no banco de dados
function inserirReceita(receita) {
    const sql = `INSERT INTO receitas(nomeReceita, ingredientes, modoPreparo, tipoReceita, img, descReceita) VALUES (
        '${receita.nomeReceita}',
        '${receita.ingredientes}',
        '${receita.modoPreparo}',
        '${receita.tipoReceita}',
        '${receita.img}',
        '${receita.descReceita}'
    )`;

    conection.query(sql, function(err){
        if(!err){
            console.log("Receita inserida com sucesso!");
        } else {
            console.log("Erro ao inserir receita:", err);
        }
    });
}

// Itera sobre as receitas e as insere no banco de dados
receitas.forEach(receita => {
    inserirReceita(receita);
});
