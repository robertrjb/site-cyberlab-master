CREATE TABLE Agendamentos (
  idAgendamentos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  tipo_agen VARCHAR(50) NOT NULL,
  data_agen DATE NOT NULL,
  hora_agen TIME NOT NULL,
  PRIMARY KEY(idAgendamentos, Clientes_idClientes),
  INDEX agendamentos_FKIndex1(Clientes_idClientes)
);

CREATE TABLE Clientes (
  idClientes INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_cli VARCHAR(100) NOT NULL,
  email_cli VARCHAR(60) NOT NULL,
  endereco_cli VARCHAR(60) NOT NULL,
  login_cli VARCHAR(30) NOT NULL,
  senha_cli VARCHAR(30) NOT NULL,
  PRIMARY KEY(idClientes)
);

CREATE TABLE Cli_pf (
  idcli_pf INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  cpf_cli VARCHAR(20) NULL,
  PRIMARY KEY(idcli_pf, Clientes_idClientes),
  INDEX cli_pf_FKIndex1(Clientes_idClientes)
);

CREATE TABLE Cli_pj (
  idcli_pj INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  cnpj_cli VARCHAR(25) NULL,
  PRIMARY KEY(idcli_pj, Clientes_idClientes),
  INDEX cli_pj_FKIndex1(Clientes_idClientes)
);

CREATE TABLE Departamentos (
  idDepartamentos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_departamento VARCHAR(50) NOT NULL,
  PRIMARY KEY(idDepartamentos)
);

CREATE TABLE RH (
  idRH INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Departamentos_idDepartamentos INTEGER UNSIGNED NOT NULL,
  nome_rh VARCHAR(100) NOT NULL,
  login_rh VARCHAR(30) NOT NULL,
  senha_rh VARCHAR(30) NOT NULL,
  celular_rh VARCHAR(20) NOT NULL,
  email_rh VARCHAR(60) NOT NULL,
  PRIMARY KEY(idRH, Departamentos_idDepartamentos),
  INDEX RH_FKIndex1(Departamentos_idDepartamentos)
);

CREATE TABLE Tecnico (
  idTecnico INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Departamentos_idDepartamentos INTEGER UNSIGNED NOT NULL,
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  nome_tec VARCHAR(100) NULL,
  login_tec VARCHAR(30) NULL,
  senha_tec VARCHAR(30) NULL,
  celular_tec VARCHAR(20) NULL,
  email_tec VARCHAR(60) NULL,
  PRIMARY KEY(idTecnico, Departamentos_idDepartamentos, Clientes_idClientes),
  INDEX Tecnico_FKIndex1(Departamentos_idDepartamentos),
  INDEX Tecnico_FKIndex2(Clientes_idClientes)
);

CREATE TABLE Tecnico_has_agendamentos (
  Tecnico_departamentos_idDepartamentos INTEGER UNSIGNED NOT NULL,
  Tecnico_idTecnico INTEGER UNSIGNED NOT NULL,
  Agendamentos_Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  agendamentos_idAgendamentos INTEGER UNSIGNED NOT NULL,
  Tecnico_Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Tecnico_departamentos_idDepartamentos, Tecnico_idTecnico, Agendamentos_Clientes_idClientes, agendamentos_idAgendamentos, Tecnico_Clientes_idClientes),
  INDEX Tecnico_has_agendamentos_FKIndex1(Tecnico_idTecnico, Tecnico_departamentos_idDepartamentos, Tecnico_Clientes_idClientes),
  INDEX Tecnico_has_agendamentos_FKIndex2(Agendamentos_Clientes_idClientes)
);

CREATE TABLE Tel_cli (
  idtel_cli INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  telefone_cli VARCHAR(20) NULL,
  PRIMARY KEY(idtel_cli, Clientes_idClientes),
  INDEX tel_cli_FKIndex1(Clientes_idClientes)
);


