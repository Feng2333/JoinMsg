<?php


namespace JoinMsg;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\permission\ServerOperator;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class MainClass extends PluginBase implements Listener{
	public function onEnable(){
	@mkdir($this->getDataFolder());
		//创建目录
		$this->config = new Config($this->getDataFolder()."config.yml", Config::YAML, array(
		//创建新配置文件
		"Quitmsg1"=>"玩家",
		"Quitmsg2"=>"退出游戏",
		"opQuit"=>true,
		"opQuitmsg1"=>"管理",
		"opQuitmsg2"=>"退出游戏",
		"Joinmsg1"=>"玩家",
		"Joinmsg2"=>"加入游戏",
		"opJoin"=>true,
		"opJoinmsg1"=>"管理",
		"opJoinmsg2"=>"加入游戏"
		));
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("JoinMsg加载中！作者:SimaFeng，QQ810529702");
	}
    public function onQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();
		$name = $player->getDisplayName();
        $q1 = $this->config->get("Quitmsg1");
		$q2 = $this->config->get("Quitmsg2");
		$qop1 = $this->config->get("opQuitmsg1");
		$qop2 = $this->config->get("opQuitmsg2");
		if($this->config->get("opQuit") == true){
		   if($player->isOp()){
		    Server::getInstance()->broadcastMessage(§e."<Quitmsg>".§f.$qop1.$name.$qop2);
			}else{
		    Server::getInstance()->broadcastMessage(§e."<Quitmsg>".§f.$q1.$name.$q2);
			}
			}else{
			Server::getInstance()->broadcastMessage(§e."<Quitmsg>".$q1.$name.$q2);
			}
			}
			public function onJoin(PlayerJoinEvent $event){
           $player = $event->getPlayer();
		     $name = $player->getDisplayName();
                $j1 = $this->config->get("Joinmsg1");
				 $j2 = $this->config->get("Joinmsg2");
				  $jop1 = $this->config->get("opJoinmsg1");
				 $jop2 = $this->config->get("opJoinmsg2");
		    if($this->config->get("opJoin") == true){
		   if($player->isOp()){
		    Server::getInstance()->broadcastMessage(§e."<Joinmsg>".§b.$jop1.$name.$jop2);
			}else{
		    Server::getInstance()->broadcastMessage("§e.<Joinmsg>".§b.$j1.$name.$j2);
			}
			}else{
			Server::getInstance()->broadcastMessage("§e.<Joinmsg>".§b.$j1.$name.$j2);
			}
			}
    }
