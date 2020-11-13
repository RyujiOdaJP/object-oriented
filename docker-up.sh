#!/bin/bash

# 各種環境コンテナ立ち上げ
# 別コンテナを立ち上げたい場合、各自ローカル環境でdocker-compose内を書き換えてください
#
# オプション:
#   default :develop
#   -l      :ローカル
#   -s      :staging
#   -p      :production
#
# 以下リストのコンテナを立ち上げたい場合、対応する環境のslot内に、コンテナ名を追記してください。
#
# デフォルトで立ち上げていないコンテナリスト
#
# 見えタロー接続(本番のみ、取扱注意)   : mysql-mietaro
# develop環境redis(ローカルではない) : redis-dev

pushd ./laradock

ms='mysql'
ro='read'

while getopts 'bpsl' opts
do
    case $opts in
        'b')
            build='--build'
            ;;
#        'p')
#            env='prod'
#            slot="mysql-prod mysql-prod-read"
#            ;;
#        's')
#            env='stg'
#            slot='redis mysql-stg mysql-stg-read'
#            ;;
        'l')
            env='local'
            slot='redis mysql'
            ;;
#        *)
#            env='dev'
#            slot="redis mysql-dev mysql-dev-read"
#            ;;
    esac
done

fixed_container="nginx"

echo "Raunching container for ${env}..."
eval "docker-compose up -d ${build} ${fixed_container} ${slot}"

popd
