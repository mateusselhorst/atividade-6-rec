INSERT INTO usuarios (nome, email) VALUES
('Mateus Cesar', 'mateuscesar@empresa.com'),
('Admin', 'admin@empresa.com');

INSERT INTO tarefas (descricao, setor, prioridade, status, fk_usuario) VALUES
('Organizar arquivos do setor de finanças', 'Financeiro', 'Média', 'A fazer', 1),
('Atualizar planilhas de controle', 'Administrativo', 'Baixa', 'Fazendo', 1),
('Manutenção dos computadores', 'TI', 'Alta', 'A fazer', 2),
('Treinamento de novos funcionários', 'RH', 'Média', 'Pronto', 1),
('Revisar contratos de fornecedores', 'Jurídico', 'Alta', 'A fazer', 2);