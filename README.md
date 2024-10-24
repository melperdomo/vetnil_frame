Ambiente docker que inicializa um servidor php 8.3 na porta 8000, via nginx.

# Requisitos
- [Docker Engine](https://docs.docker.com/engine/install/)
- Make
  - Debian/Ubuntu: (`sudo apt install make`)
  - MacOS: `xcode-select --install`
  - Windows: `choco install make`

# Instalação
- `sudo make build && sudo make run`

# Ligar/desligar o container
- Inicializar o container: `sudo make start`
- Parar o container: `sudo make stop`

# Uso
- Seus arquivos php podem ser acessados em http://localhost:8000
