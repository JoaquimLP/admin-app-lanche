<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modal-show" tabindex="-1" role="dialog" aria-labelledby="modal-show-Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="modal-show-Label">Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-lg-5">
                                    <a href="javascript:;">
                                        <div class="position-relative">
                                            <div class="blur-shadow-image">
                                                @if (isset($produto->image))
                                                    <img class="w-100 rounded-3 shadow-lg"
                                                        src="{{asset( 'storage/'. $produto->image)}}">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-7 ps-0 my-auto">
                                    <div class="card-body text-left">
                                        <div class="p-md-0 pt-3">
                                            <h5 class="font-weight-bolder mb-0">{{$this->produto->nome ?? null}}</h5>
                                        </div>
                                        <p class="mb-4 mt-2">
                                            <strong>Preço</strong>: R$ {{isset($this->produto->preco) ? number_format($this->produto->preco, 2, ',', ' ') : null}}
                                        </p>
                                        <p class="mb-4 mt-2">
                                            <strong>Descrição</strong>: <br> {{$this->produto->descricao ?? null}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-plain text-center">
                          <div class="card-body">
                            <h4 class="card-title">Categorias</h4>
                            @if (isset($this->produto->categorias))
                                @foreach ($this->produto->categorias as $item)
                                    {{$item->nome}}
                                    @if (!$loop->last)
                                        -
                                    @endif
                                @endforeach
                            @endif
                            <br>
                            <a href="{{route('produto.categoria', ['id' => $this->produto->id ?? 0])}}" class="btn btn-sm btn-info">Adicionar categorias</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-plain text-center">
                          <div class="card-body">
                            <h4 class="card-title">Ingredientes</h4>
                            @if (isset($this->produto->ingredientes))
                                @foreach ($this->produto->ingredientes as $item)
                                    {{$item->nome}}
                                    @if (!$loop->last)
                                        -
                                    @endif
                                @endforeach
                            @endif
                            <br>
                            <a href="{{route('produto.ingrediente', ['id' => $this->produto->id ?? 0])}}" class="btn btn-sm btn-info">Adicionar ingredientes</a>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="resetInput" class="btn btn-sm bg-gradient-secondary"
                        data-bs-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>
